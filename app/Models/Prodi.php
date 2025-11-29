<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prodi extends Model
{
    protected $table = "program_studi";

    protected $fillable = [
        'nama_prodi',
        'kaprodi',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class, 'prodi_fk', 'id');
    }
}
