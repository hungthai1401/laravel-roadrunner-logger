<?php

declare(strict_types=1);

namespace HT\RoadRunnerLogger;

use Override;
use Psr\Log\LoggerInterface;
use RoadRunner\Logger\Logger as RoadRunnerLoggerBase;
use Spiral\Goridge\RPC\RPC;

final class RoadRunnerLogger implements LoggerInterface
{
    private RoadRunnerLoggerBase $logger;

    public function __construct(array $config = [])
    {
        $rpcAddress = $config['rr_rpc'] ?? 'tcp://127.0.0.1:6001';
        $this->logger = new RoadRunnerLoggerBase(RPC::create($rpcAddress));
    }

    #[Override]
    public function emergency($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    #[Override]
    public function alert($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    #[Override]
    public function critical($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    #[Override]
    public function error($message, array $context = []): void
    {
        $this->logger->error($message, $context);
    }

    #[Override]
    public function warning($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    #[Override]
    public function notice($message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    #[Override]
    public function info($message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    #[Override]
    public function debug($message, array $context = []): void
    {
        $this->logger->debug($message, $context);
    }

    #[Override]
    public function log($level, $message, array $context = []): void
    {
        // Map PSR-3 log levels to RoadRunner logger methods
        switch ($level) {
            case 'emergency':
            case 'critical':
            case 'error':
                $this->logger->error($message, $context);
                break;
            case 'alert':
            case 'warning':
            case 'notice':
                $this->logger->warning($message, $context);
                break;
            case 'info':
                $this->logger->info($message, $context);
                break;
            case 'debug':
                $this->logger->debug($message, $context);
                break;
            default:
                $this->logger->log($message, $context);
        }
    }
}
