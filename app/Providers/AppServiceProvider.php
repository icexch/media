<?php

namespace App\Providers;

use App\Services\PixelPoint\PixelPointAdService;
use App\Services\PixelPoint\PixelPointPlaceService;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Тег @selected(<action>)
        // хэлпер для указания выбранного эллемента в выпадающем списке.
        Blade::directive('selected', function ($expression) {
            return "<?= !empty($expression) ? 'selected=\"selected\"' : '' ?>";
        });

        // Тег @checked(<action>)
        // хэлпер для проверки отметки чекбокса.
        Blade::directive('checked', function ($expression) {
            return "<?= !empty($expression) ? 'checked=\"checked\"' : '' ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->app->singleton(PixelPointPlaceService::class);
        $this->app->singleton(PixelPointAdService::class);
    }
}
