<?PHP

/**
 *  An Uri value object
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace \SerendipityHQ\Framework\ValueObjects\Uri;

use \Zend\Uri\Uri as BaseUri;

use SerendipityHQ\Framework\ValueObjects\Uri\UriInterface;

class Uri extends BaseUri implements UriInterface
{}
