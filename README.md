# Inertia.js Laravel Helper for Lucas Yang

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
<!-- [![GitHub Tests Action Status][ico-github-action]][link-github-action] -->
<!-- [![Style CI Build Status][ico-style-ci]][link-style-ci] -->
[![Total Downloads][ico-downloads]][link-downloads]

The Inertia.js Laravel helper

## Installation

Install the package via composer:

```bash
composer require ycs77/inertia-laravel-helper
```

## Exception Handler

*app/Exceptions/Handler.php*
```php
use Inertia\Helper\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
```

or publish exception handler file to custom:

## Pagination

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ycs77/inertia-laravel-helper?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square
<!-- [ico-github-action]: https://img.shields.io/github/workflow/status/ycs77/inertia-laravel-helper/run-tests?label=tests&style=flat-square -->
<!-- [ico-style-ci]: https://github.styleci.io/repos/417571519/shield?style=flat-square -->
[ico-downloads]: https://img.shields.io/packagist/dt/ycs77/inertia-laravel-helper?style=flat-square

[link-packagist]: https://packagist.org/packages/ycs77/inertia-laravel-helper
<!-- [link-github-action]: https://github.com/ycs77/inertia-laravel-helper/actions?query=workflow%3Arun-tests+branch%3Amain -->
<!-- [link-style-ci]: https://github.styleci.io/repos/417571519 -->
[link-downloads]: https://packagist.org/packages/ycs77/inertia-laravel-helper
