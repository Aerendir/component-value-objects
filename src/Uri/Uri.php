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
        } elseif ($uri !== null) {
            throw new InvalidArgumentException(sprintf(
                'Expecting a string or a URI object, received "%s"',
                (is_object($uri) ? get_class($uri) : gettype($uri))
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getFragment()
    {
        return $this->valueObject->getFragment();
    }

    /**
     * {@inheritdoc}
     */
    public function getHost()
    {
        return $this->valueObject->getHost();
    }

    /**
     * {@inheritdoc}
     */
    public function getPath()
    {
        return $this->valueObject->getPath();
    }

    /**
     * {@inheritdoc}
     */
    public function getPort()
    {
        return $this->valueObject->getPort();
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        return $this->valueObject->getQuery();
    }

    /**
     * {@inheritdoc}
     */
    public function getQueryAsArray()
    {
        return $this->valueObject->getQueryAsArray();
    }

    /**
     * {@inheritdoc}
     */
    public function getScheme()
    {
        return $this->valueObject->getScheme();
    }

    /**
     * {@inheritdoc}
     */
    public function getUserInfo()
    {
        return $this->valueObject->getUserInfo();
    }

    /**
     * {@inheritdoc}
     */
    public function isAbsolute()
    {
        return $this->valueObject->isAbsolute();
    }

    /**
     * {@inheritdoc}
     */
    public function isValid()
    {
        return $this->valueObject->isValid();
    }

    /**
     * {@inheritdoc}
     */
    public function isValidRelative()
    {
        return $this->valueObject->isValidRelative();
    }

    /**
     * {@inheritdoc}
     */
    public function makeRelative($baseUri)
    {
        $this->valueObject->makeRelative($baseUri);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize()
    {
        $this->valueObject->normalize();

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function parse($uri)
    {
        $this->valueObject->parse($uri);
    }

    /**
     * {@inheritdoc}
     */
    public function setFragment($fragment)
    {
        return $this->valueObject->setFragment($fragment);
    }

    /**
     * {@inheritdoc}
     */
    public function setHost($host)
    {
        return $this->valueObject->setHost($host);
    }

    /**
     * {@inheritdoc}
     */
    public function setPath($path)
    {
        return $this->valueObject->setPath($path);
    }

    /**
     * {@inheritdoc}
     */
    public function setPort($port)
    {
        return $this->valueObject->setPort($port);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery($query)
    {
        return $this->valueObject->setQuery($query);
    }

    /**
     * {@inheritdoc}
     */
    public function setScheme($scheme)
    {
        return $this->valueObject->setScheme($scheme);
    }

    /**
     * {@inheritdoc}
     */
    public function setUserInfo($userInfo)
    {
        return $this->valueObject->setUserInfo($userInfo);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(array $options = [])
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
