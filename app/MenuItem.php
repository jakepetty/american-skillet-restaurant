<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    //
    protected $fillable = [
        'name',
        'menu_category_id',
        'price',
        'caption'
    ];
    public function category()
    {
        return $this->belongsTo('App\MenuCategory', 'menu_category_id');
    }
}
