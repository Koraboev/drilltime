<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'slug',
        'description_uz',
        'description_ru',
        'description_en',

    ];
    public function submenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
