<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Support\Str;

class Model extends BaseModel
{
    protected $keyType = "string";
    public $incrementing = false;

    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
