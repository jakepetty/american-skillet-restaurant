<?php

namespace App;

class Employee extends BaseModel
{
    //
    protected $fillable = [
        'name', 'title', 'caption'
    ];
    public $images = [
        's' => [
            'w' => 120,
            'h' => 120
        ]
    ];
}
