<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'short_name',
    ];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function contact()
    {
            $this->belongsTo(Contact::class);
    }
}
