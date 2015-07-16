<?PHP

/**
 *  An Uri value object.
 *  This is just a wrapper for Zend Uri.
 *
 * @link https://github.com/zendframework/zend-uri
 *
 * @todo This has to be a Guzzle Uri or https://github.com/mvdbos/vdb-uri
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Uri;

use \Zend\Uri\Uri as BaseUri;

use \SerendipityHQ\Framework\ValueObjects\Uri\UriInterface;

class Uri extends BaseUri implements UriInterface
{
    public function __construct($uri = null)
    {
        parent::__construct($uri);
    }
}
