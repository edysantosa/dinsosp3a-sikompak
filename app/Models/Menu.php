<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    // Ini untuk mendapatkan route dari slug,
    // contohnya untuk digunakan di menu untuk ngecek menu aktif
    protected $appends = ['route'];
    public function getRouteAttribute()
    {
        return substr($this->slug, 1) ?: '/'; // return / saja kalau string kosong untuk menu
    }

    public function parent()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'parent_id')->orderBy('sort_order');
    }
     
    public function children()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id', 'id')->orderBy('sort_order');
    }
     
    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('sort_order')->get();
    }
}
