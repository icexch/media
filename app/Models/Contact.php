<?php namespace App\Models;

class Contact extends BaseModel
{
    protected $casts = [
        'name'   => 'string',
        'email'   => 'string',
        'message' => 'string',
    ];
}
