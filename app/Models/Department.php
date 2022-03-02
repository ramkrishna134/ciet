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
        'desription',
        'featured_image',
        'icon',
        'user_id',
        'status',
        'lang'
    ];
}
