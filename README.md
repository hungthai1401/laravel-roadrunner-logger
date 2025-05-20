# Laravel RoadRunner Logger

A Laravel logger wrapper for the RoadRunner app-logger, allowing seamless integration of RoadRunner's logging capabilities into your Laravel application.

## Installation

You can install the package via Composer:

```bash
composer require hungthai1401/laravel-roadrunner-logger
```

## Usage

### Configuration

After installation, publish the configuration file:

```bash
php artisan vendor:publish --tag=config
```

This will create a `config/roadrunner-logger.php` file in your application where you can modify the logger settings.

### Logging

You can use the logger in your Laravel application by specifying the 'roadrunner' channel:

```php
logger('rr')->info('This is an info message');
```

Or directly via the Log facade:

```php
use Illuminate\Support\Facades\Log;

Log::channel('rr')->error('An error occurred');
```

## Requirements

- PHP 8.1 or higher
- Laravel 9.x or 10.x
- RoadRunner app-logger 1.0 or higher

## Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
