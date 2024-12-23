<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable=[
        'name_uz',
        'name_ru',
        'name_en',
        'slug_uz',
        'slug_ru',
        'slug_en',
    ];
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
