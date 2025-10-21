<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $keyType = "string";

    protected $fillable = [
        'judul',
        'dokumentasi',
        'deskripsi',
        'tanggal_post',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function fotoBerita($request)
    {
        if ($request->hasFile('dokumentasi')) {
            $path = $request->file('dokumentasi')->store('dokumentasi_berita', 'public');
            return $path;
        }

        return null;
    }
}
