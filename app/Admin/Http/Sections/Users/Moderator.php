<?php namespace App\Admin\Http\Sections\Users;

use Illuminate\Database\Eloquent\Builder;
use AdminFormElement;

class Moderator extends User
{
    protected $alias = 'users/moderators';
}
