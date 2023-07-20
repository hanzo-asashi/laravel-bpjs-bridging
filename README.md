# Laravel package for bridging bpjs service

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hanzo-asashi/laravel-bpjs-bridging.svg?style=flat-square)](https://packagist.org/packages/hanzo-asashi/laravel-bpjs-bridging)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hanzoasashi/laravel-bpjs-bridging/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hanzo-asashi/laravel-bpjs-bridging/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hanzo-asashi/laravel-bpjs-bridging/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hanzo-asashi/laravel-bpjs-bridging/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hanzo-asashi/laravel-bpjs-bridging.svg?style=flat-square)](https://packagist.org/packages/hanzo-asashi/laravel-bpjs-bridging)
[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fhanzo-asashi%2Flaravel-bpjs-bridging.svg?type=shield)](https://app.fossa.com/projects/git%2Bgithub.com%2Fhanzo-asashi%2Flaravel-bpjs-bridging?ref=badge_shield)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require hanzo-asashi/laravel-bpjs-bridging
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-bpjs-bridging-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-bpjs-bridging-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-bpjs-bridging-views"
```

## Usage

```php
$laravelBpjsBridging = new HanzoAsashi\LaravelBpjsBridging();
echo $laravelBpjsBridging->echoPhrase('Hello, HanzoAsashi!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Hansen Makangiras](https://github.com/hanzo-asashi)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.


[![FOSSA Status](https://app.fossa.com/api/projects/git%2Bgithub.com%2Fhanzo-asashi%2Flaravel-bpjs-bridging.svg?type=large)](https://app.fossa.com/projects/git%2Bgithub.com%2Fhanzo-asashi%2Flaravel-bpjs-bridging?ref=badge_large)