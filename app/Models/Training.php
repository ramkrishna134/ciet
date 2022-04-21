<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'title' ,
        'slug' ,
        'status' ,
        'lang' ,
        'content',
        'description',
        'start_date',
        'end_date',
        'category',
        'type',
        'featured_image',
        'icon',
        'key_word',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
