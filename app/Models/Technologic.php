<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Technologic extends Model implements HasMedia

{
    use InteractsWithMedia;
    use HasFactory;
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'slug_uz',
        'slug_ru',
        'slug_en',
        'meta_title_uz',
        'meta_title_ru',
        'meta_title_en',
        'meta_description_uz',
        'meta_description_ru',
        'meta_description_en',
    ];
    public function products(): HasMany
    {
        return $this->hasMany(ShopProduct::class, 'product_id');
    }
}
