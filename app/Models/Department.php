<?php

namespace App\Models;

use App\Traits\HasMeta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory, HasMeta;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'icon',
        'user_id',
        'head_image',
        'head_message',
        'status',
        'lang'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
