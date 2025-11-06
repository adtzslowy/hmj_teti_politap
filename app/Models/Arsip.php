<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Arsip extends Model
{
    protected $table = 'arsip';

    protected $fillable = [
        'user_id',
        'nama_dokumen',
        'deskripsi',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($arsip) {
            if ($arsip->file && Storage::disk('public')->exists('arsip/' . $arsip->file)) {
                Storage::disk('public')->delete('arsip/' . $arsip->file);
            }
        });
    }
}
