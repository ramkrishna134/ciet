<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'link',
        'menu_id',
        'parent_id',
        'class',
        'depth',
        'has_child',
        'target',
        'status',
        'lang'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function parent() {
        return $this->belongsTo(static::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(static::class, 'parent_id');
    }
}
