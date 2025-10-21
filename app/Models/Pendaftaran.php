<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = "pendaftar";
    protected $keyType = "string";

    protected $fillable = [
        'divisi_dipilih_id',
        'divisi_ditempatkan_id',
        'mahasiswa_id',
        'status_pendaftaran',
        'alasan_bergabung',
        'alasan_ditolak',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function divisiDipilih()
    {
        return $this->belongsTo(Divisi::class,'divisi_dipilih_id');
    }
    public function divisiDitempatkan()
    {
        return $this->belongsTo(Divisi::class,'divisi_ditempatkan_id');
    }
}
