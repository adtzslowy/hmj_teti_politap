<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    public $incrementing = false; // karena id bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'mahasiswa_id',
        'judul_pengaduan',
        'isi_pengaduan',
        'status',
        'tanggapan',
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
}
