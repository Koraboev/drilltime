<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ShopProduct extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    protected $fillable = [
        'shop_brand_id',
        'technologic_id',
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'meta_name_uz',
        'meta_name_ru',
        'meta_name_en',
        'meta_description_uz',
        'meta_description_ru',
        'meta_description_en',
        'slug_uz',
        'slug_ru',
        'slug_en',
        'sku',
        'barcode',
        'qty',
        'security_stock',
        'featured',
        'is_visible',
        'old_price',
        'price',
        'cost',
        'type',
        'backorder',
        'requires_shipping',
    ];

    protected $table = 'shop_products';

    protected $casts = [
        'featured' => 'boolean',
        'is_visible' => 'boolean',
        'backorder' => 'boolean',
        'requires_shipping' => 'boolean',
        'published_at' => 'date',
    ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(ShopBrand::class, 'shop_brand_id');
    }
    public function technologic(): BelongsTo
    {
        return $this->belongsTo(Technologic::class, 'technologic_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ShopCategory::class, 'shop_category_product', 'shop_product_id', 'shop_category_id')->withTimestamps();
    }


}
