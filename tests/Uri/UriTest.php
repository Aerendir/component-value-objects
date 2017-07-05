<?PHP

/**
 *  An Uri value object.
 *  This is just a wrapper for Zend Uri.
 *
 * @link https://github.com/zendframework/zend-uri
 *
 * @todo This has to be a Guzzle Uri or https://github.com/mvdbos/vdb-uri
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Uri;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use SerendipityHQ\Component\ValueObjects\Uri\UriInterface;
use Zend\Uri\Exception\InvalidArgumentException;

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

        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
        $this::assertTrue(is_array($resource->getQueryAsArray()));
        $this::assertTrue(is_bool($resource->isAbsolute()));
        $this::assertTrue(is_bool($resource->isValid()));
        $this::assertTrue(is_bool($resource->isValidRelative()));
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

        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
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
     * @link https://github.com/zendframework/zend-uri/blob/master/test/UriTest.php#L725-L735
     */
    public function testMakeRelative()
    {
        $base = 'http://example.com/dir/subdir/';
        $url = 'http://example.com/dir/subdir/more/file1.txt';
        $expected = 'more/file1.txt';

        $resource = new Uri($url);

        $resource->makeRelative($base);
        $this::assertSame($expected, $resource->toString());
    }
}
