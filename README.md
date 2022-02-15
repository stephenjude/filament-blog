# Filament Blog Builder

[![Latest Version on Packagist](https://img.shields.io/packagist/v/stephenjude/filament-blog.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-blog)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/stephenjude/filament-blog/run-tests?label=tests)](https://github.com/stephenjude/filament-blog/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/stephenjude/filament-blog/Check%20&%20fix%20styling?label=code%20style)](https://github.com/stephenjude/filament-blog/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/stephenjude/filament-blog.svg?style=flat-square)](https://packagist.org/packages/stephenjude/filament-blog)

Filament blog builder.

## Installation

You can install the package via composer:

```bash
composer require stephenjude/filament-blog
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="filament-blog-migrations"
php artisan migrate
```

## Usage

```php
$filamentBlog = new Stephenjude\FilamentBlog();
echo $filamentBlog->echoPhrase('Hello, Stephenjude!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [stephenjude](https://github.com/stephenjude)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
