<?PHP

/**
 *  An Email value object.
 *
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Email;

use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

interface EmailInterface extends ValueObjectInterface
{
    public function getEmail();

    public function getMailBox();

    public function getHost();

    public function changeMailBox($newMailBox);
}
