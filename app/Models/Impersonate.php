<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Impersonate extends Model
{
    public $timestamps = false;

    protected $table = 'impersonations';

    protected $fillable = [
        'impersonator_guard',
        'impersonator_id',
        'target_guard',
        'target_id',
        'ip',
        'user_agent',
        'started_at',
        'stopped_at',
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
