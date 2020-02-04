<?php

namespace Astrotomic\LaravelMime;

use BadMethodCallException;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Symfony\Component\Mime\MimeTypes as SymfonyMimeTypes;

/** @mixin SymfonyMimeTypes */
class MimeTypes
{
    /** @var SymfonyMimeTypes */
    protected $mimeTypes;

    public function __construct(SymfonyMimeTypes $mimeTypes)
    {
        $this->mimeTypes = $mimeTypes;
    }

    /**
     * @param string|string[] $mimeTypes
     *
     * @return array
     */
    public function getExtensions($mimeTypes): array
    {
        return Collection::make(Arr::wrap($mimeTypes))
            ->map(function (string $mimeType): array {
                return $this->mimeTypes->getExtensions($mimeType);
            })
            ->collapse()
            ->unique()
            ->values()
            ->all();
    }

    /**
     * @param string|string[] $extensions
     *
     * @return array
     */
    public function getMimeTypes($extensions): array
    {
        return Collection::make(Arr::wrap($extensions))
            ->map(function (string $extension): array {
                return $this->mimeTypes->getMimeTypes($extension);
            })
            ->collapse()
            ->unique()
            ->values()
            ->all();
    }

    public function __call(string $method, array $arguments)
    {
        if (method_exists($this->mimeTypes, $method)) {
            return call_user_func_array([$this->mimeTypes, $method], $arguments);
        }

        throw new BadMethodCallException(sprintf(
            'Method "%s" does not exist on class "%s" and could not be found on "%s".',
            $method,
            static::class,
            get_class($this->mimeTypes)
        ));
    }
}