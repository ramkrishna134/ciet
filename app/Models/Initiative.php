<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'icon',
        'description',
        'content',
        'web_link',
        'play_store',
        'apple_store',
        'window_store',
        'user_id',
        'key_word',
        'status',
        'order',
        'lang'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
