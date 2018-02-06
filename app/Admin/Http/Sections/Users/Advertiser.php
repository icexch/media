<?php namespace App\Admin\Http\Sections\Users;

use Illuminate\Database\Eloquent\Builder;
use AdminFormElement;

class Advertiser extends User
{
    protected $alias = 'users/advertisers';

    /**
     * @return \SleepingOwl\Admin\Contracts\Display\DisplayInterface
     */
    public function onDisplay()
    {
        $adminDisplay = parent::onDisplay();

        return $adminDisplay->setApply(function (Builder $query) {
            $query->where('role', \App\Models\User\Advertiser::ROLE);
        })->paginate(20);
    }

    /**
     * @return \SleepingOwl\Admin\Contracts\Form\FormInterface
     */
    public function onCreate()
    {
        return parent::onCreate()->addItem(AdminFormElement::hidden('role')->setDefaultValue(\App\Models\User\Advertiser::ROLE));
    }
}
