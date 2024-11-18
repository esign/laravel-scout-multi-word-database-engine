# Laravel Scout database driver to match multiple words separately

[![Latest Version on Packagist](https://img.shields.io/packagist/v/esign/laravel-scout-multi-word-database-engine.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-scout-multi-word-database-engine)
[![Total Downloads](https://img.shields.io/packagist/dt/esign/laravel-scout-multi-word-database-engine.svg?style=flat-square)](https://packagist.org/packages/esign/laravel-scout-multi-word-database-engine)
![GitHub Actions](https://github.com/esign/laravel-scout-multi-word-database-engine/actions/workflows/main.yml/badge.svg)

A short intro about the package.

## Installation

You can install the package via composer:

```bash
composer require esign/laravel-scout-multi-word-database-engine
```

The package will automatically register a service provider.

Next up, you can publish the configuration file:
```bash
php artisan vendor:publish --provider="Esign\ScoutMultiWordDatabaseEngine\ScoutMultiWordDatabaseEngineServiceProvider" --tag="config"
```

## Usage

### Testing

```bash
composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
