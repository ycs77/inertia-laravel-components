# Inertia.js Laravel Components

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Style CI Build Status][ico-style-ci]][link-style-ci]
[![Total Downloads][ico-downloads]][link-downloads]

The Inertia.js Laravel & Vue components library

Components list:
<!-- no toc -->
* [Error Handler](#error-handler)
* [Pagination](#pagination)

## Supported Versions

| Version                                                             | Laravel Version     |
| ------------------------------------------------------------------- | ------------------- |
| [0.x](https://github.com/ycs77/inertia-laravel-components/tree/0.x) | 7.x, 8.x, 9.x, 10.x |

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
