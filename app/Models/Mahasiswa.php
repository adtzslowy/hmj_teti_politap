<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    protected $table = "mahasiswa";
    protected $keyType = "string";
    protected $fillable = [
        'nama_mahasiswa',
        'nim',
        'password',
        'status_mahasiswa',
        'jenis_kelamin',
        'foto_profil'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function profilePath($request)
    {
        if ($request->hasFile('foto_profil')) {
            $path = $request->file('foto_profil')->store('profile_picture', 'public');
            return $path;
        }

        return null;
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class, 'mahasiswa_id');
    }

    public function pendaftaranAnggota()
    {
        return $this->hasOne(Pendaftaran::class, 'mahasiswa_id');
    }
}
