<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'mahasiswa_id',
        'judul_pengaduan',
        'deskripsi',
        'status',
        'tanggapan',
        'bukti_aduan'
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

    public function deleteFile()
    {
        if ($this->bukti_aduan && Storage::disk('public')->exists($this->bukti_aduan)) {
            Storage::disk('public')->delete($this->bukti_aduan);
        }
    }
}
