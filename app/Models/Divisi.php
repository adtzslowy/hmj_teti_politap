<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'divisi';
    public $incrementing = false;

    protected $fillable = [
        'nama_divisi',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'divisi_id');
    }

    public function pendaftar()
    {
        return $this->hasMany(Pendaftaran::class, 'divisi_dipilih_id');
    }
}
