<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        // 'url',
        'android',
        'ios',
        'window',
        'icon',
        'user_id',
        'status',
        'lang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
