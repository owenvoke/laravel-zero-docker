# Laravel Zero Docker

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github-actions]][link-github-actions]
[![Style CI][ico-styleci]][link-styleci]
[![Total Downloads][ico-downloads]][link-downloads]
[![Buy us a tree][ico-treeware-gifting]][link-treeware-gifting]

A Laravel Zero command to generate a Dockerfile using Box

## Install

Via Composer

```bash
$ composer require --dev owenvoke/laravel-zero-docker
```

Then register `OwenVoke\LaravelZeroDocker\DockerServiceProvider` in your `config/app.php` file:

```php
'providers' => [
    \OwenVoke\LaravelZeroDocker\DockerServiceProvider::class,
]
```

## Usage

Once you have built your Phar using `app:build`, you can run `app:docker` and the `Dockerfile` will be generated in the `builds/` directory.

```bash
php application app:docker
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@voke.dev instead of using the issue tracker.

## Credits

- [Owen Voke][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

You're free to use this package, but if it makes it to your production environment you are required to buy the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to plant trees. If you support this package and contribute to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees [here][link-treeware-gifting].

Read more about Treeware at [treeware.earth][link-treeware].

[ico-version]: https://img.shields.io/packagist/v/owenvoke/laravel-zero-docker.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://img.shields.io/github/workflow/status/owenvoke/laravel-zero-docker/Tests.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/313560499/shield
[ico-downloads]: https://img.shields.io/packagist/dt/owenvoke/laravel-zero-docker.svg?style=flat-square
[ico-treeware-gifting]: https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen?style=flat-square

[link-packagist]: https://packagist.org/packages/owenvoke/laravel-zero-docker
[link-github-actions]: https://github.com/owenvoke/laravel-zero-docker/actions
[link-styleci]: https://styleci.io/repos/313560499
[link-downloads]: https://packagist.org/packages/owenvoke/laravel-zero-docker
[link-treeware]: https://treeware.earth
[link-treeware-gifting]: https://ecologi.com/owenvoke?gift-trees
[link-author]: https://github.com/owenvoke
[link-contributors]: ../../contributors
