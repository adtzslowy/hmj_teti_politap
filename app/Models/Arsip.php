<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Arsip extends Model
{
    protected $table = 'arsip';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'nama_dokumen',
        'deskripsi',
        'file',
    ];

    public $incrementing = false; // karena pakai UUID
    protected $keyType = 'string'; // pastikan tipe key string

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id', 'id');
    }

    public static function uuid()
    {
        parent::uuid();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        }) ;
    }

    protected static function boot()
    {
        parent::boot();

        // Buat UUID otomatis saat record baru dibuat
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });

        // Hapus file otomatis saat arsip dihapus
        static::deleting(function ($arsip) {
            if ($arsip->file && Storage::disk('public')->exists('arsip/' . $arsip->file)) {
                Storage::disk('public')->delete('arsip/' . $arsip->file);
            }
        });
    }
}
