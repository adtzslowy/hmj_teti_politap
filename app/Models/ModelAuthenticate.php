<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
class ModelAuthenticate extends Authenticatable
{
    protected $keyType = 'string';
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::orderedUuid();
        });
    }

    public function getPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
