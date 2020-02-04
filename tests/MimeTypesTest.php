<?php

namespace Astrotomic\LaravelMime\Tests;

use Astrotomic\LaravelMime\MimeTypes;
use Astrotomic\LaravelMime\MimeTypesServiceProvider;
use Illuminate\Support\Arr;
use Orchestra\Testbench\TestCase;
use Symfony\Component\Mime\MimeTypeGuesserInterface;
use Symfony\Component\Mime\MimeTypes as SymfonyMimeTypes;
use Symfony\Component\Mime\MimeTypesInterface;
use Astrotomic\LaravelMime\Facades\MimeTypes as MimeTypesFacade;

class MimeTypesTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            MimeTypesServiceProvider::class,
        ];
    }

    /**
     * @test
     * @dataProvider symfonyServiceBindings
     */
    public function it_can_instantiate_symfony_bindings(string $service): void
    {
        $this->assertInstanceOf(SymfonyMimeTypes::class, $this->app->make($service));
    }

    /**
     * @test
     * @dataProvider laravelServiceBindings
     */
    public function it_can_instantiate_laravel_bindings(string $service): void
    {
        $this->assertInstanceOf(MimeTypes::class, $this->app->make($service));
    }

    /** @test */
    public function it_can_convert_multiple_mimetypes_into_extensions(): void
    {
        $extensions = MimeTypesFacade::getExtensions([
            'image/png',
            'image/jpeg',
            'image/jpeg2000',
            'image/jpeg2',
        ]);

        $this->assertEquals(
            Arr::sort(['png', 'jpeg', 'jpg', 'jpe', 'jp2', 'jpg2']),
            Arr::sort($extensions)
        );
    }

    /** @test */
    public function it_can_convert_multiple_extensions_into_mimetypes(): void
    {
        $extensions = MimeTypesFacade::getMimeTypes([
            'png',
            'jpeg',
            'jpg',
            'jpe',
            'jp2',
            'jpg2',
        ]);

        $this->assertEquals(
            Arr::sort(['image/png', 'image/jpeg', 'image/pjpeg', 'image/jp2', 'image/jpeg2000', 'image/jpeg2000-image', 'image/x-jpeg2000-image']),
            Arr::sort($extensions)
        );
    }

    public function symfonyServiceBindings(): array
    {
        return [
            [SymfonyMimeTypes::class],
            [MimeTypesInterface::class],
            [MimeTypeGuesserInterface::class],
        ];
    }

    public function laravelServiceBindings(): array
    {
        return [
            [MimeTypes::class],
        ];
    }
}
