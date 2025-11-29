<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lab404\Impersonate\Models\Impersonate;

class Admin extends Authenticatable
{
    use Impersonate;
    protected $table = "admin";

    protected $keyType = "string";
    protected $fillable = [
        "name",
        "email",
        'nim',
        "password",
        "foto_profil",
        "role",
        "program_studi_id",
    ];

    public function arsip()
    {
        return $this->hasMany(Arsip::class, 'user_id', 'id');
    }

    public $incrementing = false;

    public function photoPath($request)
    {
        if ($request->hasFile("foto_profil")) {
            $path = $request->file('foto_profil')->store('profile_admin', 'public');
            return $path;
        }

        return null;
    }

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function canImpersonate()
    {
        return true;
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'program_studi_id', 'id');
    }
}
