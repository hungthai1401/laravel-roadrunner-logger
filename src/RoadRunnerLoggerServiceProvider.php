<?php

declare(strict_types=1);

namespace HT\RoadRunnerLogger;

use Illuminate\Support\ServiceProvider;
use Illuminate\Log\LogManager;

final class RoadRunnerLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/roadrunner-logger.php',
            'logging.channels',
        );
        $this->app->extend(LogManager::class, function (LogManager $manager) {
            $manager->extend('rr', function ($app, array $config) {
                return new RoadRunnerLogger($config);
            });
            
            return $manager;
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/roadrunner-logger.php' => config_path('roadrunner-logger.php'),
        ], 'logging');
    }
}
