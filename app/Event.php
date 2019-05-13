<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    //
    protected $fillable = [
        'name', 'caption', 'start_time'
    ];
    public $images = [
        's' => [
            'w' => 144,
            'h' => 96
        ],
        'l' => [
            'w' => 720,
            'h' => 480
        ]
    ];
}
