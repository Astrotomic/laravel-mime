<?php

namespace Astrotomic\LaravelMime\Facades;

use Illuminate\Support\Facades\Facade;
use Astrotomic\LaravelMime\MimeTypes as AstrotomicMimeTypes;

/**
 * @method static bool isGuesserSupported()
 * @method static null|string guessMimeType(string $path)
 * @method static \Illuminate\Support\Collection|string[] getExtensions(string|string[] $mimeTypes)
 * @method static \Illuminate\Support\Collection|string[] getMimeTypes(string|string[] $extensions)
 *
 * @see \Symfony\Component\Mime\MimeTypeGuesserInterface
 * @see \Symfony\Component\Mime\MimeTypesInterface
 * @see \Symfony\Component\Mime\MimeTypes
 * @see \Astrotomic\LaravelMime\MimeTypes
 */
class MimeTypes extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AstrotomicMimeTypes::class;
    }
}
