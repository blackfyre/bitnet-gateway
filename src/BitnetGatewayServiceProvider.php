<?php

namespace Blackfyre\BitnetGateway;

use Illuminate\Support\ServiceProvider;

class BitnetGatewayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $configPath = __DIR__ . '/../config/config.php';
            $configName = 'bitnet-gateway.php';

            if (function_exists('config_path')) {
                $publishPath = config_path($configName);
            } else {
                $publishPath = base_path('config/' . $configName);
            }

            $this->publishes([
                $configPath => $publishPath,
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'bitnet-gateway');

        // Register the main class to use with the facade
        $this->app->singleton('bitnet-gateway', function () {
            return new BitnetGateway;
        });
    }
}
