<?php

declare(strict_types=1);

namespace HT\RoadRunnerLogger\Tests;

use HT\RoadRunnerLogger\RoadRunnerLogger;
use HT\RoadRunnerLogger\RoadRunnerLoggerServiceProvider;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Log;
use Orchestra\Testbench\TestCase;
use Psr\Log\LoggerInterface;

final class RoadRunnerLoggerTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            RoadRunnerLoggerServiceProvider::class,
        ];
    }

    public function testLoggerCreation(): void
    {
        /** @var LoggerInterface|Logger $logger */
        $logger = Log::channel('rr');
        $this->assertInstanceOf(RoadRunnerLogger::class, $logger->getLogger());
    }
}
