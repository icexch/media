<?php namespace App\Providers;

use Illuminate\View\ViewServiceProvider as ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ViewServiceProvider extends ServiceProvider
{
    public function registerBladeEngine($resolver)
    {
        parent::registerBladeEngine($resolver);

        $this->app->extend('blade.compiler', function ($blade) {
            return $this->extendBladeEngine($blade);
        });
    }

    /**
     * @param BladeCompiler $blade
     *
     * @return BladeCompiler
     */
    protected function extendBladeEngine(BladeCompiler $blade)
    {
        // Тег @selected(<action>)
        // хэлпер для указания выбранного эллемента в выпадающем списке.
        $blade->directive('selected', function ($expression) {
            return "<?= !empty($expression) ? 'selected=\"selected\"' : '' ?>";
        });

        // Тег @checked(<action>)
        // хэлпер для проверки отметки чекбокса.
        $blade->directive('checked', function ($expression) {
            return "<?= !empty($expression) ? 'checked=\"checked\"' : '' ?>";
        });

        return $blade;
    }
}
