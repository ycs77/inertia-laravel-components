# Inertia.js Laravel Components

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Style CI Build Status][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

> [!IMPORTANT]
> This package is only supported Laravel v7~v10, it's recommended to use [Inertia Engage](https://github.com/ycs77/inertia-engage) package instead with Laravel 11+ usage.

The Inertia.js Laravel & Vue components library.

Components list:
<!-- no toc -->
* [Error Handler](#error-handler)
* [Pagination](#pagination)

## Installation

Install the package via composer:

```bash
composer require ycs77/inertia-laravel-components
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
use Inertia\Exceptions\Handler as ExceptionHandler;

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

[ico-version]: https://img.shields.io/packagist/v/ycs77/inertia-laravel-components?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen?style=flat-square
[ico-style-ci]: https://github.styleci.io/repos/444753402/shield?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/ycs77/inertia-laravel-components?style=flat-square

[link-packagist]: https://packagist.org/packages/ycs77/inertia-laravel-components
[link-style-ci]: https://github.styleci.io/repos/444753402
[link-downloads]: https://packagist.org/packages/ycs77/inertia-laravel-components
