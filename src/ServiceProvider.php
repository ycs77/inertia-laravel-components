<?php

namespace Inertia\Ui;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Inertia\Ui\Pagination\Paginator;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/inertia-ui.php', 'inertia-ui');

        if ($this->app['config']->get('inertia-ui.register_pagination')) {
            $this->app->bind(LengthAwarePaginator::class, Paginator::class);
        }
    }

    public function boot()
    {
        $this->publishingFiles();
    }

    protected function publishingFiles()
    {
        $pagesPath = $this->app['config']->get('inertia-ui.pages_path');
        $componentsPath = $this->app['config']->get('inertia-ui.components_path');
        $stylesPath = $this->app['config']->get('inertia-ui.styles_path');

        $this->publishes([
            __DIR__.'/../config/inertia-ui.php' => config_path('inertia-ui.php'),
        ], 'inertia-ui-config');

        $this->publishes([
            __DIR__.'/../resources/error-vue' => $pagesPath,
        ], 'inertia-error-vue');

        $this->publishes([
            __DIR__.'/../resources/error-vue-ts' => $pagesPath,
        ], 'inertia-error-vue-ts');

        $this->publishes([
            __DIR__.'/../resources/pagination-css' => $stylesPath,
        ], 'inertia-pagination-css');

        $this->publishes([
            __DIR__.'/../resources/pagination-vue' => $componentsPath,
        ], 'inertia-pagination-vue');

        $this->publishes([
            __DIR__.'/../resources/pagination-vue-ts' => $componentsPath,
        ], 'inertia-pagination-vue-ts');
    }
}
