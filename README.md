# Inertia.js Laravel UI

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

<!-- [![GitHub Tests Action Status][ico-github-action]][link-github-action] -->
<!-- [![Style CI Build Status][ico-style-ci]][link-style-ci] -->

The Inertia.js Laravel & Vue component library

Components list:
<!-- no toc -->
* [Error Handler](#error-handler)
* [Pagination](#pagination)

## Installation

Install the package via composer:

```bash
composer require ycs77/inertia-laravel-ui
```

## Error Handler

Publish error page:

```bash
php artisan vendor:publish --tag=inertia-error-vue
# or ts
php artisan vendor:publish --tag=inertia-error-vue-ts
```

Change extends handler class:

*app/Exceptions/Handler.php*
```php
use Inertia\Ui\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
```

## Pagination

Publish pagination css file:

```bash
php artisan vendor:publish --tag=inertia-pagination-css
```

Publish pagination component:

```bash
php artisan vendor:publish --tag=inertia-pagination-vue
# or ts
php artisan vendor:publish --tag=inertia-pagination-vue-ts
```

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/ycs77/inertia-laravel-ui?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square
<!-- [ico-github-action]: https://img.shields.io/github/workflow/status/ycs77/inertia-laravel-ui/run-tests?label=tests&style=flat-square -->
<!-- [ico-style-ci]: https://github.styleci.io/repos/417571519/shield?style=flat-square -->
[ico-downloads]: https://img.shields.io/packagist/dt/ycs77/inertia-laravel-ui?style=flat-square

[link-packagist]: https://packagist.org/packages/ycs77/inertia-laravel-ui
<!-- [link-github-action]: https://github.com/ycs77/inertia-laravel-ui/actions?query=workflow%3Arun-tests+branch%3Amain -->
<!-- [link-style-ci]: https://github.styleci.io/repos/417571519 -->
[link-downloads]: https://packagist.org/packages/ycs77/inertia-laravel-ui
