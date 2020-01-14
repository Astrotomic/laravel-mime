<?php

namespace Astrotomic\LaravelMime\Tests;

use Astrotomic\LaravelMime\MimeTypesServiceProvider;
use Orchestra\Testbench\TestCase;
use Symfony\Component\Mime\MimeTypeGuesserInterface;
use Symfony\Component\Mime\MimeTypes;
use Symfony\Component\Mime\MimeTypesInterface;

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
     * @dataProvider serviceBindings
     */
    public function it_can_instantiate_service(string $service): void
    {
        $this->assertInstanceOf(MimeTypes::class, $this->app->make($service));
    }

    public function serviceBindings(): array
    {
        return [
            ['laravel-mime'],
            [MimeTypes::class],
            [MimeTypesInterface::class],
            [MimeTypeGuesserInterface::class],
        ];
    }
}
