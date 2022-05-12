<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artical extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'icon',
        'url',
        'date',
        'month',
        'year',
        'user_id',
        'lang',
        'status',
        'latest',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
