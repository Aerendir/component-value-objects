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

class UriTest extends TestCase
{
    public function testUri()
    {
        $test = 'http://user@example.com:80/path/?query=string#fragment';

        $resource = new Uri($test);

        // Test the value object direct interface
        $this::assertInstanceOf(UriInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
        $this::assertIsArray($resource->getQueryAsArray());
        $this::assertIsBool($resource->isAbsolute());
        $this::assertIsBool($resource->isValid());
        $this::assertIsBool($resource->isValidRelative());
    }

    public function testUriCanMergeAnotherUri()
    {
        $test = 'http://user@example.com:80/path/?query=string#fragment';

        $toMerge = new Uri($test);

        $resource = new Uri($toMerge);

        // Test the value object direct interface
        $this::assertInstanceOf(UriInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(SimpleValueObjectInterface::class, $resource);

        $this::assertIsString($resource->__toString());
        $this::assertIsString($resource->toString());
    }

    public function testUriThrowsAnExceptionIfUriIsNotNullStringOrUriObject()
    {
        // An integer
        $test = 33;

        $this->expectException(InvalidArgumentException::class);
        new Uri($test);
    }

    public function testNormalize()
    {
        $test = 'http://user@example.com:80/path/../to/parent/folder?query=string#fragment';

        $resource = new Uri($test);

        $resource->normalize();

        $this::assertSame('/to/parent/folder', $resource->getPath());
    }

    /**
     * @see https://github.com/zendframework/zend-uri/blob/master/test/UriTest.php#L725-L735
     */
    public function testMakeRelative()
    {
        $base     = 'http://example.com/dir/subdir/';
        $url      = 'http://example.com/dir/subdir/more/file1.txt';
        $expected = 'more/file1.txt';

        $resource = new Uri($url);

        $resource->makeRelative($base);
        $this::assertSame($expected, $resource->toString());
    }
}
