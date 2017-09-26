<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Uri;

use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;
use Zend\Uri\Exception\InvalidArgumentException;
use Zend\Uri\Uri as BaseUri;

/**
 * Default implementation of an Uri value obeject.
 */
class Uri implements UriInterface
{
    use DisableWritingMethodsTrait;

    private $valueObject;

    /**
     * Copied and pasted from BaseUri.
     *
     * {@inheritdoc}
     */
    public function __construct($uri)
    {
        $this->valueObject = new BaseUri();

        if (is_string($uri)) {
            // Remove the trailing slash
            $uri = rtrim($uri, '/');
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
            throw new InvalidArgumentException(sprintf(
                'Expecting a string or a URI object, received "%s"',
                (is_object($uri) ? get_class($uri) : gettype($uri))
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFragment(): ?string
    {
        return $this->valueObject->getFragment();
    }

    /**
     * {@inheritdoc}
     */
    public function getHost(): ?string
    {
        return $this->valueObject->getHost();
    }

    /**
     * {@inheritdoc}
     */
    public function getPath(): ?string
    {
        return $this->valueObject->getPath();
    }

    /**
     * {@inheritdoc}
     */
    public function getPort(): ?int
    {
        return $this->valueObject->getPort();
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): ?string
    {
        return $this->valueObject->getQuery();
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryAsArray(): array
    {
        return $this->valueObject->getQueryAsArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getScheme(): ?string
    {
        return $this->valueObject->getScheme();
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInfo(): ?string
    {
        return $this->valueObject->getUserInfo();
    }

    /**
     * {@inheritdoc}
     */
    public function isAbsolute(): bool
    {
        return $this->valueObject->isAbsolute();
    }

    /**
     * {@inheritdoc}
     */
    public function isValid(): bool
    {
        return $this->valueObject->isValid();
    }

    /**
     * {@inheritdoc}
     */
    public function isValidRelative(): bool
    {
        return $this->valueObject->isValidRelative();
    }

    /**
     * {@inheritdoc}
     */
    public function makeRelative($baseUri): UriInterface
    {
        $this->valueObject->makeRelative($baseUri);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(): UriInterface
    {
        $this->valueObject->normalize();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function parse(string $uri): UriInterface
    {
        $this->valueObject->parse($uri);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setFragment(?string $fragment): UriInterface
    {
        $this->valueObject->setFragment($fragment);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setHost(?string $host): UriInterface
    {
        $this->valueObject->setHost($host);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setPath(?string $path): UriInterface
    {
        $this->valueObject->setPath($path);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setPort(?int $port): UriInterface
    {
        $this->valueObject->setPort($port);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery($query): UriInterface
    {
        $this->valueObject->setQuery($query);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setScheme(?string $scheme): UriInterface
    {
        $this->valueObject->setScheme($scheme);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setUserInfo(?string $userInfo): UriInterface
    {
        $this->valueObject->setUserInfo($userInfo);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = []): string
    {
        return $this->__toString();
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return $this->valueObject->toString();
    }
}
