<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class LoginLogs extends Model
{
    protected $fillable = ["user_id", 'role', 'user_type', 'ip_address', 'logged_in_at'];
    public $timestamps = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'user_id');
    }
}
