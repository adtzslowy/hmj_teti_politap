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
        'prodi_id',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function fotoBerita($request)
    {
        if ($request->hasFile('dokumentasi')) {
            $file = $request->file('dokumentasi');
            $path = $file->store('dokumentasi_berita', 'public');
            return $path;
        }

        return $this->dokumentasi ?? null;
    }
}
