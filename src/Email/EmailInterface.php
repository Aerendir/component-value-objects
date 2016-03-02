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

use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Common\ValueObjectInterface;

/**
 * Defines the minimum requisites of an Email value object.
 */
interface EmailInterface extends SimpleValueObjectInterface
{
    /**
     * Returns the original email passed to the object.
     *
     * @return string
     */
    public function getEmail();

    /**
     * The mail box part of the email (box@host.com).
     *
     * @return string
     */
    public function getMailBox();

    /**
     * Return the host part of the email (box@host.com).
     * @return string
     */
    public function getHost();

    /**
     * Change the mailbox.
     *
     * This returns a new Email object.
     *
     * @param $newMailBox
     * @return $this
     */
    public function changeMailBox($newMailBox);
}
