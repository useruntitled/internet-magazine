<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug()
    {
        static::saving(function ($model) {
            if (empty($model->slug) && $model->name) {
                $model->slug = strtolower(Str::slug($model->name));
            }
        });
    }
}
