<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = "admin";

    protected $keyType = "string";
    protected $fillable = [
        "name",
        "email",
        'nim',
        "password",
        "foto_profil",
        "role",
    ];

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
}
