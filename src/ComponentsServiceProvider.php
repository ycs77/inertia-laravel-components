<?php

namespace Inertia;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Inertia\Pagination\Paginator;

class ComponentsServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/inertia-components.php', 'inertia-components');

        if ($this->app['config']->get('inertia-components.register_pagination')) {
            $this->app->bind(LengthAwarePaginator::class, Paginator::class);
        }
    }

    public function boot()
    {
        $this->publishingFiles();
    }

    protected function publishingFiles()
    {
        $pagesPath = $this->app['config']->get('inertia-components.pages_path');
        $componentsPath = $this->app['config']->get('inertia-components.components_path');
        $stylesPath = $this->app['config']->get('inertia-components.styles_path');

        $this->publishes([
            __DIR__.'/../config/inertia-components.php' => config_path('inertia-components.php'),
        ], 'inertia-components-config');

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
