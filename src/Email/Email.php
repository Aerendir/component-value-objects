<?PHP

/**
 *  An Email value object.
 *
 * This is inspired by the wowo Email Value Object
 * @link https://gist.github.com/wowo/b49ac45b975d5c489214
 * @link https://github.com/egulias/EmailValidator
 *
 * @package  Serendipity\Framework
 * @subpackage ValueObjects
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */

namespace SerendipityHQ\Component\ValueObjects\Email;

use SerendipityHQ\Component\ValueObjects\Uri\Uri;
use Egulias\EmailValidator\EmailValidator;

class Email implements EmailInterface
{
    protected $email;
    protected $mailBox;
    protected $host;

    public function __construct($email = null, $validator = null)
    {
        if (null === $validator)
            $validator = new EmailValidator();

        if (!$validator->isValid($email))
            throw new \InvalidArgumentException('This does not look like an email');

        $this->email = $email;

        list($this->mailBox, $this->host) = explode('@', $this->email);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getHost()
    {
        return $this->host;
    }

    public function getMailBox()
    {
        return $this->mailBox;
    }

    public function changeMailBox($newMailbox)
    {
        $copy = clone $this;
        $copy->mailBox = $newMailbox;

        return $copy;
    }

    public function __toString()
    {
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }

    public function __set($field, $value){}
}
