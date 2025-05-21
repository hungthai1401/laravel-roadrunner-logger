<?php

declare(strict_types=1);

namespace HT\RoadRunnerLogger;

use Illuminate\Log\LogManager;
use Illuminate\Support\ServiceProvider;
use RoadRunner\Logger\Logger;
use Spiral\Goridge\RPC\RPC;

/**
 * @phpstan-type TConfig array<string, mixed>
 */
final class RoadRunnerLoggerServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        // Merge rr channel configuration with the default logging configuration
        $this->mergeConfigFrom(
            __DIR__ . '/../config/roadrunner-logger.php',
            'logging.channels',
        );
        
        $this->app->extend(LogManager::class, function (LogManager $manager) {
            $manager->extend('rr', function ($app, array $config) {
                /** @var TConfig $config */
                /** @var non-empty-string $rpcAddress */
                $rpcAddress = $config['rr_rpc'] ?? 'tcp://127.0.0.1:6001';

                return new RoadRunnerLogger(new Logger(RPC::create($rpcAddress)));
            });

            return $manager;
        });
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void {}
}
