<?PHP

/**
 *  An Email value object
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Framework\ValueObjects\Email;

use SerendipityHQ\Framework\ValueObjects\Common\ValueObjectInterface;

interface EmailInterface extends ValueObjectInterface
{
    public function getEmail();
    public function getMailBox();
    public function getHost();
    public function changeMailBox($newMailBox);
}
