<?php

namespace LaravelPhoenix\AutoFilesLocalizer;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\FileLoader;

class AutoTranslationServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register()
    {
        $this->app->singleton('translator', function ($app) {
            return new AutoTranslator($app['translation.loader'], $app['config']['app.locale']);
        });
        
        $this->mergeConfigFrom(
            __DIR__ . '/../config/auto-translator.php', 'auto-translator'
        );
    }

    public function provides()
    {
        return ['translator'];
    }
}