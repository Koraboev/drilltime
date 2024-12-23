<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    use HasFactory;
    protected $fillable=[
        'menu_id',
        'meta_title_uz',
        'meta_title_ru',
        'meta_title_en',
        'slug',
        'meta_description_uz',
        'meta_description_ru',
        'meta_description_en',
    ];
    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
