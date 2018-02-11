<?php namespace App\Admin\Providers;

use App\Admin\Widgets\NavigationUserBlock;
use App\Models\AdMaterial;
use App\Models\Category;
use App\Models\Platform;
use App\Models\Region;
use App\Models\User\Advertiser;
use App\Models\User\Moderator;
use App\Models\User\Publisher;
use SleepingOwl\Admin\Contracts\Widgets\WidgetsRegistryInterface;
use SleepingOwl\Admin\Contracts\Navigation\NavigationInterface;
use SleepingOwl\Admin\Providers\AdminSectionsServiceProvider as ServiceProvider;

class AdminSectionsServiceProvider extends ServiceProvider
{
    protected $sections = [
        Moderator::class  => 'App\Admin\Http\Sections\Users\Moderator',
        Advertiser::class => 'App\Admin\Http\Sections\Users\Advertiser',
        Publisher::class  => 'App\Admin\Http\Sections\Users\Publisher',
        AdMaterial::class => 'App\Admin\Http\Sections\AdMaterial',
        Category::class   => 'App\Admin\Http\Sections\Category',
        Region::class     => 'App\Admin\Http\Sections\Region',
        Platform::class   => 'App\Admin\Http\Sections\Platform'
    ];

    /**
     * @var array
     */
    protected $widgets = [
        NavigationUserBlock::class
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

        $this->app->call([$this, 'registerViews']);
    }

    /**
     * @param NavigationInterface $navigation
     */
    public function registerNavigation(NavigationInterface $navigation)
    {
        require app_path('Admin/navigation.php');
    }

    /**
     * @param WidgetsRegistryInterface $widgetsRegistry
     */
    public function registerViews(WidgetsRegistryInterface $widgetsRegistry)
    {
        foreach ($this->widgets as $widget) {
            $widgetsRegistry->registerWidget($widget);
        }
    }

}
