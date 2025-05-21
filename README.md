# Laravel RoadRunner Logger

A Laravel logger wrapper for the RoadRunner app-logger, allowing seamless integration of RoadRunner's logging capabilities into your Laravel application.

## Requirements

- PHP 8.1 or higher
- Laravel 9.x or higher
- RoadRunner app-logger 1.0 or higher

## Installation

You can install the package via Composer:

```bash
composer require hungthai1401/laravel-roadrunner-logger
```

## Usage

### Configuration

After installation, you can set RoadRunner RPC address in your `.env` file, or use the default value `tcp://127.0.0.1:6001`:

```env
RR_RPC=...
```

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

## Testing

```bash
composer test:unit
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
