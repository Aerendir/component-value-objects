<?php

declare(strict_types=1);

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Uri;

use Laminas\Uri\Exception\InvalidArgumentException;
use Laminas\Uri\Uri as BaseUri;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

use function Safe\sprintf;

/**
 * Default implementation of an Uri value obeject.
 */
final class Uri implements UriInterface
{
    use DisableWritingMethodsTrait;

    private BaseUri $valueObject;

    /**
     * @param string|UriInterface $uri
     */
    public function __construct($uri)
    {
        $this->valueObject = new BaseUri();

        if (\is_string($uri)) {
            // Remove the trailing slash
            $uri = \rtrim($uri, '/');
            $this->parse($uri);
        } elseif ($uri instanceof UriInterface) {
            // Copy constructor
            $this->setScheme($uri->getScheme());
            $this->setUserInfo($uri->getUserInfo());
            $this->setHost($uri->getHost());
            $this->setPort($uri->getPort());
            $this->setPath($uri->getPath());
            $this->setQuery($uri->getQuery());
            $this->setFragment($uri->getFragment());
        } elseif (null !== $uri) {
            throw new InvalidArgumentException(sprintf('Expecting a string or a URI object, received "%s"', \is_object($uri) ? \get_class($uri) : \gettype($uri)));
        }
    }

    public function __toString(): string
    {
        return $this->valueObject->toString();
    }

    public function getFragment(): ?string
    {
        return $this->valueObject->getFragment();
    }

    public function getHost(): ?string
    {
        return $this->valueObject->getHost();
    }

    public function getPath(): ?string
    {
        return $this->valueObject->getPath();
    }

    public function getPort(): ?int
    {
        return $this->valueObject->getPort();
    }

    public function getQuery(): ?string
    {
        return $this->valueObject->getQuery();
    }

    /**
     * @psalm-suppress MixedReturnTypeCoercion
     *
     * @return array<string,string>
     */
    public function getQueryAsArray(): array
    {
        return $this->valueObject->getQueryAsArray();
    }

    public function getScheme(): ?string
    {
        return $this->valueObject->getScheme();
    }

    public function getUserInfo(): ?string
    {
        return $this->valueObject->getUserInfo();
    }

    public function isAbsolute(): bool
    {
        return $this->valueObject->isAbsolute();
    }

    public function isValid(): bool
    {
        return $this->valueObject->isValid();
    }

    public function isValidRelative(): bool
    {
        return $this->valueObject->isValidRelative();
    }

    public function makeRelative($baseUri): UriInterface
    {
        if ($baseUri instanceof UriInterface) {
            $baseUri = $baseUri->__toString();
        }

        $this->valueObject->makeRelative($baseUri);

        return $this;
    }

    public function normalize(): UriInterface
    {
        $this->valueObject->normalize();

        return $this;
    }

    public function parse(string $uri): UriInterface
    {
        $this->valueObject->parse($uri);

        return $this;
    }

    public function setFragment(?string $fragment): UriInterface
    {
        $this->valueObject->setFragment($fragment);

        return $this;
    }

    public function setHost(?string $host): UriInterface
    {
        $this->valueObject->setHost($host);

        return $this;
    }

    public function setPath(?string $path): UriInterface
    {
        $this->valueObject->setPath($path);

        return $this;
    }

    public function setPort(?int $port): UriInterface
    {
        $this->valueObject->setPort($port);

        return $this;
    }

    /**
     * @param array<string,string>|string|null $query
     */
    public function setQuery($query): UriInterface
    {
        $this->valueObject->setQuery($query);

        return $this;
    }

    public function setScheme(?string $scheme): UriInterface
    {
        $this->valueObject->setScheme($scheme);

        return $this;
    }

    public function setUserInfo(?string $userInfo): UriInterface
    {
        $this->valueObject->setUserInfo($userInfo);

        return $this;
    }

    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    public function getValueObject(): BaseUri
    {
        return $this->valueObject;
    }
}
