<?php

namespace Astrotomic\LaravelMime;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mime\MimeTypeGuesserInterface;
use Symfony\Component\Mime\MimeTypes as SymfonyMimeTypes;
use Symfony\Component\Mime\MimeTypesInterface;

class MimeTypesServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register(): void
    {
        $this->app->singleton(SymfonyMimeTypes::class,SymfonyMimeTypes::class);
        $this->app->alias(SymfonyMimeTypes::class, MimeTypesInterface::class);
        $this->app->alias(SymfonyMimeTypes::class, MimeTypeGuesserInterface::class);

        $this->app->singleton(MimeTypes::class,MimeTypes::class);
    }

    public function provides(): array
    {
        return [
            SymfonyMimeTypes::class,
            MimeTypesInterface::class,
            MimeTypeGuesserInterface::class,

            MimeTypes::class,
        ];
    }
}
