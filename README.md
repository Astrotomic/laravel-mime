

# Laravel Mime

[![Latest Version](http://img.shields.io/packagist/v/astrotomic/laravel-mime.svg?label=Release&style=for-the-badge&cacheSeconds=600)](https://packagist.org/packages/astrotomic/laravel-mime)
[![MIT License](https://img.shields.io/github/license/Astrotomic/laravel-mime.svg?label=License&color=blue&style=for-the-badge&cacheSeconds=600)](https://github.com/Astrotomic/laravel-mime/blob/master/LICENSE)
[![Offset Earth](https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-green?style=for-the-badge&cacheSeconds=600)](https://plant.treeware.earth/Astrotomic/laravel-mime)

This package provides Laravel service bindings for [symfony/mime](https://symfony.com/doc/current/components/mime.html).

## Installation

You can install the package via composer:

```bash
composer require astrotomic/laravel-mime
```

## Usage

``` php
use Astrotomic\LaravelMime\Facades\MimeTypes;

MimeTypes::getExtensions($mimeTypes);
MimeTypes::getMimeTypes($extensions);
```

## Credits

- [Tom Witkowski](https://github.com/Gummibeer)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.## Treeware

You're free to use this package, but if it makes it to your production environment I would highly appreciate you buying the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to [plant trees](https://www.bbc.co.uk/news/science-environment-48870920). If you contribute to my forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees at [offset.earth/treeware](https://plant.treeware.earth/Astrotomic/laravel-mime)

Read more about Treeware at [treeware.earth](https://treeware.earth)### Security

If you discover any security related issues, please check [SECURITY](https://github.com/Astrotomic/.github/blob/master/SECURITY.md) for steps to report it.
