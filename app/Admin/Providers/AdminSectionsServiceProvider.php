<?php namespace App\Admin\Providers;

use App\Models\AdMaterial;
use App\Models\User\Advertiser;
use App\Models\User\Moderator;
use App\Models\User\Publisher;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
    protected $sections = [
        Moderator::class  => 'App\Admin\Http\Sections\Users\Moderator',
        Advertiser::class => 'App\Admin\Http\Sections\Users\Advertiser',
        Publisher::class  => 'App\Admin\Http\Sections\Users\Publisher',
        AdMaterial::class => 'App\Admin\Http\Sections\AdMaterial'
    ];

    /**
     * Register sections.
     *
     * @return void
     */
    public function boot(\SleepingOwl\Admin\Admin $admin)
    {
        $this->app->call([$this, 'registerNavigation']);
        parent::boot($admin);
    }

    /**
     * @param NavigationInterface $navigation
     */
    public function registerNavigation(NavigationInterface $navigation)
    {
        require app_path('Admin/navigation.php');
    }

}
