<?php

declare(strict_types=1);

namespace Mortezaa97\Sliders;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Mortezaa97\Sliders\Models\Slide;
use Mortezaa97\Sliders\Models\Slider;
use Mortezaa97\Sliders\Policies\SlidePolicy;
use Mortezaa97\Sliders\Policies\SliderPolicy;

class SlidersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        Gate::policy(Slider::class, SliderPolicy::class);
        Gate::policy(Slide::class, SlidePolicy::class);
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('sliders.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'sliders');

        // Register the main class to use with the facade
        $this->app->singleton('sliders', function () {
            return new Sliders;
        });
    }
}
