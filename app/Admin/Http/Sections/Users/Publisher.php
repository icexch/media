<?php namespace App\Admin\Http\Sections\Users;

use Illuminate\Database\Eloquent\Builder;
use AdminFormElement;

class Publisher extends User
{
    protected $alias = 'users/publishers';

    /**
     * @return \SleepingOwl\Admin\Contracts\Display\DisplayInterface
     */
    public function onDisplay()
    {
        $adminDisplay = parent::onDisplay();

        return $adminDisplay->setApply(function (Builder $query) {
            $query->where('role', \App\Models\User\Publisher::ROLE);
        })->paginate(20);
    }

    /**
     * @return \SleepingOwl\Admin\Contracts\Form\FormInterface
     */
    public function onCreate()
    {
        return parent::onCreate()->addItem(AdminFormElement::hidden('role')->setDefaultValue(\App\Models\User\Publisher::ROLE));
    }
}
