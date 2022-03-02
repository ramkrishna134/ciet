<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'desription',
        'content',
        'featured_icon',
        'user_id',
        'status',
        'lang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // public function show($slug) {
    //     return $this->posts($slug) || $this->categories($slug) || $this->pages($slug) || abort(404);
    // }
}
