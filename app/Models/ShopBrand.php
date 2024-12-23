<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class ShopBrand extends Model
{
    use HasFactory;
    protected $table = 'shop_brands';
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'slug_uz',
        'slug_ru',
        'slug_en',
        'website',
        'position',
        'is_visible',
    ];



    /**
     * @var array<string, string>
     */
    protected $casts = [
        'is_visible' => 'boolean',
    ];

//    public function addresses(): MorphToMany
//    {
//        return $this->morphToMany(Address::class, 'addressable', 'addressables');
//    }

    public function products(): HasMany
    {
        return $this->hasMany(ShopProduct::class, 'shop_brand_id');
    }
}
