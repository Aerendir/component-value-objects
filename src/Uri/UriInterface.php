<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Uri;

use Laminas\Uri\Exception\InvalidUriPartException;
use Laminas\Uri\Uri;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;

/**
 * Defines the minimum requisites of an Uri Value Object.
 *
 * The methods are copied and pasted from\Laminas\Uri\UriInterface as there is a conflict on the toString() method
 * signature.
 *
 * {@inheritdoc}
 */
interface UriInterface extends SimpleValueObjectInterface
{
    /**
     * Check if the URI is valid.
     *
     * Note that a relative URI may still be valid
     *
     * @return bool
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function isValid(): bool;

    /**
     * Check if the URI is a valid relative URI.
     *
     * @return bool
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function isValidRelative(): bool;

    /**
     * Check if the URI is an absolute or relative URI.
     *
     * @return bool
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function isAbsolute(): bool;

    /**
     * Parse a URI string.
     *
     * @param string $uri
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function parse(string $uri): self;

    /**
     * Normalize the URI.
     *
     * Normalizing a URI includes removing any redundant parent directory or
     * current directory references from the path (e.g. foo/bar/../baz becomes
     * foo/baz), normalizing the scheme case, decoding any over-encoded
     * characters etc.
     *
     * Eventually, two normalized URLs pointing to the same resource should be
     * equal even if they were originally represented by two different strings
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function normalize(): self;

    /**
     * Convert the link to a relative link by substracting a base URI.
     *
     *  This is the opposite of resolving a relative link - i.e. creating a
     *  relative reference link from an original URI and a base URI.
     *
     *  If the two URIs do not intersect (e.g. the original URI is not in any
     *  way related to the base URI) the URI will not be modified.
     *
     * @param string|Uri|UriInterface $baseUri
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function makeRelative($baseUri): self;

    /**
     * Get the scheme part of the URI.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getScheme(): ?string;

    /**
     * Get the User-info (usually user:password) part.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getUserInfo(): ?string;

    /**
     * Get the URI host.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getHost(): ?string;

    /**
     * Get the URI port.
     *
     * @return int|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getPort(): ?int;

    /**
     * Get the URI path.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getPath(): ?string;

    /**
     * Get the URI query.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getQuery(): ?string;

    /**
     * Return the query string as an associative array of key => value pairs.
     *
     * This is an extension to RFC-3986 but is quite useful when working with
     * most common URI types
     *
     * @return array<string,string>
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getQueryAsArray(): array;

    /**
     * Get the URI fragment.
     *
     * @return string|null
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function getFragment(): ?string;

    /**
     * Set the URI scheme.
     *
     * If the scheme is not valid according to the generic scheme syntax or
     * is not acceptable by the specific URI class (e.g. 'http' or 'https' are
     * the only acceptable schemes for the\Laminas\Uri\Http class) an exception
     * will be thrown.
     *
     * You can check if a scheme is valid before setting it using the
     * validateScheme() method.
     *
     * @param string|null $scheme
     *
     * @throws InvalidUriPartException
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setScheme(?string $scheme): self;

    /**
     * Set the URI User-info part (usually user:password).
     *
     * @param string|null $userInfo
     *
     * @throws InvalidUriPartException If the schema definition
     *                                 does not have this part
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setUserInfo(?string $userInfo): self;

    /**
     * Set the URI host.
     *
     * Note that the generic syntax for URIs allows using host names which
     * are not necessarily IPv4 addresses or valid DNS host names. For example,
     * IPv6 addresses are allowed as well, and also an abstract "registered name"
     * which may be any name composed of a valid set of characters, including,
     * for example, tilda (~) and underscore (_) which are not allowed in DNS
     * names.
     *
     * Subclasses of Uri may impose more strict validation of host names - for
     * example the HTTP RFC clearly states that only IPv4 and valid DNS names
     * are allowed in HTTP URIs.
     *
     * @param string|null $host
     *
     * @throws InvalidUriPartException
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setHost(?string $host): self;

    /**
     * Set the port part of the URI.
     *
     * @param int|null $port
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setPort(?int $port): self;

    /**
     * Set the path.
     *
     * @param string|null $path
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setPath(?string $path): self;

    /**
     * Set the query string.
     *
     * If an array is provided, will encode this array of parameters into a
     * query string. Array values will be represented in the query string using
     * PHP's common square bracket notation.
     *
     * @param array<string,string>|string|null $query
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setQuery($query): self;

    /**
     * Set the URI fragment part.
     *
     * @param string|null $fragment
     *
     * @throws InvalidUriPartException If the schema definition
     *                                 does not have this part
     *
     * @return UriInterface
     *
     * @see \Laminas\Uri\UriInterface
     */
    public function setFragment(?string $fragment): self;
}
