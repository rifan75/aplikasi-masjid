<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Admin', 'Database/Migrations'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->app->bind(
            'Modules\Admin\Http\Repos\User\ProcessUserRepoInterface',
            'Modules\Admin\Http\Repos\User\ProcessUserRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\User\ProcessRoleRepoInterface',
            'Modules\Admin\Http\Repos\User\ProcessRoleRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\ProcessCategoryRepoInterface',
            'Modules\Admin\Http\Repos\ProcessCategoryRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Finance\ProcessTypeRepoInterface',
            'Modules\Admin\Http\Repos\Finance\ProcessTypeRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\ProcessScholarRepoInterface',
            'Modules\Admin\Http\Repos\ProcessScholarRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Mustahiq\ProcessMustahiqRepoInterface',
            'Modules\Admin\Http\Repos\Mustahiq\ProcessMustahiqRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Yatim\ProcessYatimRepoInterface',
            'Modules\Admin\Http\Repos\Yatim\ProcessYatimRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Lecture\ProcessLectureRepoInterface',
            'Modules\Admin\Http\Repos\Lecture\ProcessLectureRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Event\ProcessEventRepoInterface',
            'Modules\Admin\Http\Repos\Event\ProcessEventRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\ProcessMosqueRepoInterface',
            'Modules\Admin\Http\Repos\ProcessMosqueRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Finance\ProcessDonationRepoInterface',
            'Modules\Admin\Http\Repos\Finance\ProcessDonationRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\Finance\ProcessCostRepoInterface',
            'Modules\Admin\Http\Repos\Finance\ProcessCostRepo'
            );
        $this->app->bind(
            'Modules\Admin\Http\Repos\User\ProcessMyUserRepoInterface',
            'Modules\Admin\Http\Repos\User\ProcessMyUserRepo'
            );
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Admin', 'Config/config.php') => config_path('admin.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Admin', 'Config/config.php'), 'admin'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/admin');

        $sourcePath = module_path('Admin', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/admin';
        }, \Config::get('view.paths')), [$sourcePath]), 'admin');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/admin');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'admin');
        } else {
            $this->loadTranslationsFrom(module_path('Admin', 'Resources/lang'), 'admin');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Admin', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
