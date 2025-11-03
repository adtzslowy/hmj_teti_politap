<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengaduan extends Model
{
    use HasFactory;

    /**
     * Karena id bertipe CHAR(36)/UUID, bukan auto-increment.
     */
    public $incrementing = false;

    /**
     * ID-nya berupa string, bukan integer.
     */
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'judul_pengaduan',
        'isi_pengaduan',
        'status',
        'tanggapan',
    ];

    /**
     * Generate UUID otomatis saat data dibuat.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (! $model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    /**
     * Relasi ke tabel users
     */
    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class);
    }
}
