<?php

declare(strict_types=1);

namespace HT\RoadRunnerLogger;

use Override;
use Psr\Log\LoggerInterface;
use RoadRunner\Logger\Logger as RoadRunnerLoggerBase;
use Stringable;

/**
 * @phpstan-type TMessage string|\Stringable
 * @phpstan-type TContext array<string, mixed>
 */
final class RoadRunnerLogger implements LoggerInterface
{
    public function __construct(private readonly RoadRunnerLoggerBase $logger) {}

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function emergency(Stringable|string $message, array $context = []): void
    {
        $this->logger->error((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function alert(Stringable|string $message, array $context = []): void
    {
        $this->logger->warning((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function critical(Stringable|string $message, array $context = []): void
    {
        $this->logger->error((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function error(Stringable|string $message, array $context = []): void
    {
        $this->logger->error((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function warning(Stringable|string $message, array $context = []): void
    {
        $this->logger->warning((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function notice(Stringable|string $message, array $context = []): void
    {
        $this->logger->warning((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function info(Stringable|string $message, array $context = []): void
    {
        $this->logger->info((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function debug(Stringable|string $message, array $context = []): void
    {
        $this->logger->debug((string) $message, $context);
    }

    /**
     * @param  TMessage  $message
     * @param  TContext  $context
     */
    #[Override]
    public function log($level, Stringable|string $message, array $context = []): void
    {
        // Map PSR-3 log levels to RoadRunner logger methods
        switch ($level) {
            case 'emergency':
            case 'critical':
            case 'error':
                $this->logger->error((string) $message, $context);
                break;
            case 'alert':
            case 'warning':
            case 'notice':
                $this->logger->warning((string) $message, $context);
                break;
            case 'info':
                $this->logger->info((string) $message, $context);
                break;
            case 'debug':
                $this->logger->debug((string) $message, $context);
                break;
            default:
                $this->logger->log((string) $message, $context);
        }
    }
}
