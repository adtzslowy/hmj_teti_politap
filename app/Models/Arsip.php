<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Arsip extends Model
{
    protected $table = 'arsip';

    protected $fillable = [
        'id_admin',
        'nama_dokumen',
        'deskripsi',
        'file',
    ];

    public $incrementing = false;

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id');
    }


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });

        static::deleting(function ($arsip) {
            if ($arsip->file && Storage::disk('public')->exists('arsip/' . $arsip->file)) {
                Storage::disk('public')->delete('arsip/' . $arsip->file);
            }
        });
    }

    public function uploadFile($request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('arsip', $fileName, 'public');
            $this->file = $fileName;
        }
    }

    public function replaceFile($request)
    {
        if ($request->hasFile('file')) {
            if ($this->file && Storage::disk('public')->exists('arsip/' . $this->file)) {
                Storage::disk('public')->delete('arsip/' . $this->file);
            }

            $this->uploadFile($request);
        }
    }
}
