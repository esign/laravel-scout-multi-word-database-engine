# Laravel Scout database driver to match multiple words separately

[![Latest Version on Packagist](https://img.shields.io/packagist/v/esign/laravel-scout-multi-word-database-engine.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-scout-multi-word-database-engine)
[![Total Downloads](https://img.shields.io/packagist/dt/esign/laravel-scout-multi-word-database-engine.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-scout-multi-word-database-engine)
![GitHub Actions](https://github.com/esign/laravel-scout-multi-word-database-engine/actions/workflows/main.yml/badge.svg)

This package is an extension of Laravel Scout database driver to match multiple words separately.
The default behaviour of the Laravel Scout database driver is to match the whole search query as a single string.
This package allows you to match each word of the search query separately.

## Installation

You can install the package via composer:

```bash
composer require esign/laravel-scout-multi-word-database-engine
```

The package will automatically register a service provider.

## Usage
To use the multi-word database engine as a default, you may configure the `SCOUT_DRIVER` environment variable in your `.env` file to `multi-word-database`.

To configure the multi-word database engine for a specific model, you may add the following property to the model:
```php
use Laravel\Scout\Searchable;
use Laravel\Scout\Engines\Engine;

class Post extends Model
{
    use Searchable;

    public function searchableUsing(): Engine
    {
        return app(EngineManager::class)->engine('multi-word-database');
    }
}
```

### Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
