<?php namespace App\Models;


class Region extends BaseModel
{
    protected $casts = [
        'name' => 'string'
    ];

    public $timestamps = false;
}
