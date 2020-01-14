<?php

namespace Astrotomic\LaravelMime\Facades;

use Illuminate\Support\Facades\Facade;
use Symfony\Component\Mime\MimeTypesInterface;

/**
 * @method static bool isGuesserSupported()
 * @method static null|string guessMimeType(string $path)
 * @method static string[] getExtensions(string $mimeType)
 * @method static string[] getMimeTypes(string $ext)
 *
 * @see \Symfony\Component\Mime\MimeTypeGuesserInterface
 * @see \Symfony\Component\Mime\MimeTypesInterface
 * @see \Symfony\Component\Mime\MimeTypes
 */
class MimeTypes extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return MimeTypesInterface::class;
    }
}
