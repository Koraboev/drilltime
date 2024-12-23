<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ShopCategory extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'parent_id',
        'slug_uz',
        'slug_ru',
        'slug_en',
        'position',
        'is_visible',
        'meta_title_uz',
        'meta_title_ru',
        'meta_title_en',
        'meta_description_uz',
        'meta_description_ru',
        'meta_description_en',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function children(): HasMany
    {
        return $this->hasMany(ShopCategory::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(ShopCategory::class, 'parent_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(ShopProduct::class, 'shop_category_product', 'shop_category_id', 'shop_product_id');
    }
}
