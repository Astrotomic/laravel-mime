<?php

namespace Astrotomic\LaravelMime;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mime\MimeTypeGuesserInterface;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Mime\MimeTypesInterface;

class MimeTypesServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton('laravel-mime',MimeTypes::class);
        $this->app->alias('laravel-mime', MimeTypesInterface::class);
        $this->app->alias('laravel-mime', MimeTypeGuesserInterface::class);
    }

    public function provides(): array
    {
        return [
            'laravel-mime',
            MimeTypes::class,
            MimeTypesInterface::class,
            MimeTypeGuesserInterface::class,
        ];
    }
}
