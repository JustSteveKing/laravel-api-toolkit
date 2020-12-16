# A toolkit for creating APIs in Laravel

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![PHP Version](https://img.shields.io/packagist/php-v/juststeveking/php-sdk.svg?style=flat-square)](https://php.net)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/juststeveking/laravel-api-toolkit.svg?style=flat-square)](https://packagist.org/packages/juststeveking/laravel-api-toolkit)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/juststeveking/laravel-api-toolkit/run-tests?label=tests)](https://github.com/juststeveking/laravel-api-toolkit/actions?query=workflow%3ATests+branch%3Amaster)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/JustSteveKing/laravel-api-toolkit/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/JustSteveKing/laravel-api-toolkit/?branch=main)
[![Total Downloads](https://img.shields.io/packagist/dt/juststeveking/laravel-api-toolkit.svg?style=flat-square)](https://packagist.org/packages/juststeveking/laravel-api-toolkit)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require juststeveking/laravel-api-toolkit
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="JustSteveKing\Laravel\ApiToolkit\ApiToolkitServiceProvider" --tag="config"
```

This is the contents of the published config file:

```php
return [
    'resource_name' => '%sResource',
    'policy_name' => '%sPolicy',
    'seeder_name' => '%sSeeder',
    'controllers' => [
        [
            'name' => 'IndexController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'CreateController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'ShowController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'UpdateController',
            'options' => [
                '--invokable',
            ]
        ],
        [
            'name' => 'DeleteController',
            'options' => [
                '--invokable',
            ]
        ],
    ],
    'form_requests' => [
        'CreateRequest',
        'UpdateRequest',
    ],
];
```

## Usage

To get starteed using this, there is only one command you really need to worry about: `api-toolkit:resource`.

The only option you need to pass it is the eloquent Model you wish to create and create the APi blueprint for.

```bash
php artisan api-toolkit:resource Post
```

The above command will generate:

- `app/Models/Post.php`
- `app/Policies/PostPolicy.php` - Class name can be altered in config
- `app/Http/Resources/PostResource.php` - Class name can be altered in config
- `app/Http/Requests/Api/Post/CreateRequest.php` - Class name can be altered in config
- `app/Http/Requests/Api/Post/UpdateRequest.php` - Class name can be altered in config
- `app/Http/Controllers/Post/IndexController.php` - Class name can be altered in config
- `app/Http/Controllers/Post/CreateController.php` - Class name can be altered in config
- `app/Http/Controllers/Post/ShowController.php` - Class name can be altered in config
- `app/Http/Controllers/Post/UpdateController.php` - Class name can be altered in config
- `app/Http/Controllers/Post/DeleteController.php` - Class name can be altered in config
- `database/seeds/PostSeeder.php` - Class name can be altered in config
- `database/factories/PostFactory.php`
- `database/migrations/xxxx_xx_xx_xxxxxx_create_posts_table.php`

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

- [Steve McDougall](https://github.com/JustSteveKing)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
