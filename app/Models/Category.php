<?php

namespace App\Models;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'nesting_level',
        'icon',
    ];

    protected static function booted(): void
    {
        static::saving(function ($model) {
            $category = Category::find($model->parent_id);
            if ($category) {
                $model->nesting_level = $category->nesting_level ? $category->nesting_level + 1 : 1;
                $model->slug = $category->slug . '-' . Str::slug($model->name);
            } else {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function childrens(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
