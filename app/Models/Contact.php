<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'phone1',
        'phone2',
        'email1',
        'email2',
        'work_time',
        'facebook',
        'linkedin',
        'instagram',
        'youtube',
        'telegram',
        'text',
        'language_id',
    ];
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
