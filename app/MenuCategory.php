<?php

namespace App;

class MenuCategory extends BaseModel
{
    //
    protected $fillable = [
        'name'
    ];
    public $images = [
        'l' => [
            'w' => 720,
            'h' => 960
        ],
        'm' => [
            'w' => 770,
            'h' => 230
        ],
        's' => [
            'w' => 720,
            'h' => 450
        ]
    ];

    public function items()
    {
        return $this->hasMany('App\MenuItem');
    }
}
