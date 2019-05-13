<?php

namespace App;

class Photo extends BaseModel
{
    //
    protected $fillable = ['caption', 'seo_text'];
    public $images = [
        's' => [
            'w' => 80,
            'h' => 80
        ],
        'm' => [
            'w' => 320,
            'h' => 240
        ],
        'l' => [
            'w' => 720,
            'h' => 538
        ],
        'xl' => [
            'w' => 720,
            'h' => 720
        ]
    ];
}
