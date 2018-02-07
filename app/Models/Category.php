<?php namespace App\Models;


class Category extends BaseModel
{
    protected $casts = [
        'name' => 'string'
    ];

    public $timestamps = false;
}
