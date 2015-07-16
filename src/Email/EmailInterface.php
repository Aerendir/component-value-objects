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

interface EmailInterface
{
    public function getEmail();
    public function getMailBox();
    public function getHost();
    public function changeMailBox($newMailBox);
    public function __toString();
}
