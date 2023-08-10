[![PHP Composer](https://github.com/Laravel-Phoenix/Auto-Files-Localizer/actions/workflows/php.yml/badge.svg)](https://github.com/Laravel-Phoenix/Auto-Files-Localizer/actions/workflows/php.yml)

# Auto Files Localizer

Laravel Localization package that auto generate json locale files.

## Table of Contents
* [Installation](#installation)
* [Usage](#usage)
* [Tutorials](#tutorials)
* [License](#license)

![logo](assets/auto-files-localizer.svg)

## Installation

First install the package using:

```shell
composer require laravel-phoenix/auto-files-localizer
```

If you need to register the service provider manually at `config/app.php`

```php
'providers' => [
    LaravelPhoenix\AutoFilesLocalizer\AutoTranslationServiceProvider::class,
    // MUST BE ABOVE "TranslationServiceProvider"
    Illuminate\Translation\TranslationServiceProvider::class,
],
```

Check the `.env` file it Should have

```
AUTO_LOCALIZER_ENABLED=true
```

If it doesn't exist please add it manually

## Usage

It will automatically work and generate `.json` files and the localized **requested** words inside them sorted alphabetically.

Note that this package won't work on production for optimization purposes, but if you want to change this setting you should publish the `config/auto-localizer.php` file:

```shell
php artisan vendor:publish --provider="LaravelPhoenix\AutoFilesLocalizer\AutoTranslationServiceProvider" --tag="config"
```

```php

return [
    /*
    |--------------------------------------------------------------------------
    | Auto Localizer Enabled
    |--------------------------------------------------------------------------
    |
    | This option determines whether the auto localizer functionality is enabled.
    | When set to true, the package will save translations automatically.
    |
    */
    'enabled' => (bool) env('AUTO_LOCALIZER_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Translation Path
    |--------------------------------------------------------------------------
    |
    | This option defines the directory where the translated files will be saved.
    | By default, it uses the 'resources/lang' directory of your Laravel app.
    |
    */
    'path' => resource_path('lang'),

    /*
    |--------------------------------------------------------------------------
    | Production Mode
    |--------------------------------------------------------------------------
    |
    | This option controls whether the auto localizer functionality is active in
    | the production environment. If set to true, the functionality will work
    | in all environments, including production.
    |
    */
    'production' => false, // Turn this to true to work on production
];

```
## Tutorials

[A Step-by-Step Guide on How to Use Auto Files Localizer](https://www.linkedin.com/pulse/how-use-laravel-auto-files-localizer-laravel-phoenix/)

[Youtube Video (comming soon...)](#)


## License

This package is open-source software released under the [MIT License](LICENSE).
