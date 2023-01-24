<?php

namespace Untitledpng\Laravel1Password;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Publish config
        $this->publishes([
            __DIR__ . '/../config/laravel-1password.php' => config_path('laravel-1password.php'),
        ]);
    }

    /**
     * @inheritDoc
     */
    public function register(): void
    {
        // Load config
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-1password.php', 'laravel-1password');
        
        $this->registerRepositories();
        $this->registerMacros();
    }

    /**
     * Register repositories related to the package.
     *
     * @return void
     */
    private function registerRepositories(): void
    {
        $this->app->singleton(
            \Untitledpng\Laravel1Password\Contracts\Repositories\VaultRepositoryContract::class,
            \Untitledpng\Laravel1Password\Repositories\VaultRepository::class
        );
        $this->app->singleton(
            \Untitledpng\Laravel1Password\Contracts\Repositories\ItemRepositoryContract::class,
            \Untitledpng\Laravel1Password\Repositories\ItemRepository::class
        );
        $this->app->singleton(
            \Untitledpng\Laravel1Password\Contracts\Repositories\GenericRepositoryContract::class,
            \Untitledpng\Laravel1Password\Repositories\GenericRepository::class
        );
    }

    /**
     * Register macros for supporting this package.
     *
     * @return void
     */
    private function registerMacros(): void
    {
        Collection::macro('putFirst', function (callable $callback, $value) {
            $found = false;
            return self::map(static function ($item) use ($callback, $value, &$found) {
                if ($found || !$callback($item)) {
                    return $item;
                }
                $found = true;
                return $value;
            });
        });
    }
}
