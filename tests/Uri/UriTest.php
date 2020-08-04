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

namespace SerendipityHQ\Component\ValueObjects\Tests\Uri;

use Laminas\Uri\Exception\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use SerendipityHQ\Component\ValueObjects\Uri\UriInterface;

final class UriTest extends TestCase
{
    /**
     * @var string
     */
    private const BASE = 'http://example.com/dir/subdir/';
    /**
     * @var string
     */
    private const URL = 'http://example.com/dir/subdir/more/file1.txt';
    public function testUri(): void
    {
        $test = 'http://user@example.com:80/path/?query=string#fragment';

        $resource = new Uri($test);

        // Test the value object direct interface
        self::assertInstanceOf(UriInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
        self::assertIsArray($resource->getQueryAsArray());
        self::assertIsBool($resource->isAbsolute());
        self::assertIsBool($resource->isValid());
        self::assertIsBool($resource->isValidRelative());
    }

    public function testUriCanMergeAnotherUri(): void
    {
        $test = 'http://user@example.com:80/path/?query=string#fragment';

        $toMerge = new Uri($test);

        $resource = new Uri($toMerge);

        // Test the value object direct interface
        self::assertInstanceOf(UriInterface::class, $resource);

        // Test the type of value object interface
        self::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        self::assertIsString($resource->__toString());
        self::assertIsString($resource->toString());
    }

    public function testUriThrowsAnExceptionIfUriIsNotNullStringOrUriObject(): void
    {
        // An integer
        $test = 33;

        $this->expectException(InvalidArgumentException::class);
        new Uri($test);
    }

    public function testNormalize(): void
    {
        $test = 'http://user@example.com:80/path/../to/parent/folder?query=string#fragment';

        $resource = new Uri($test);

        $resource->normalize();

        self::assertSame('/to/parent/folder', $resource->getPath());
    }

    /**
     * @see https://github.com/zendframework/zend-uri/blob/master/test/UriTest.php#L725-L735
     */
    public function testMakeRelative(): void
    {
        $expected = 'more/file1.txt';
        $resource = new Uri(self::URL);
        $resource->makeRelative(self::BASE);
        self::assertSame($expected, $resource->toString());
    }
}
