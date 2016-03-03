<?PHP

/**
 *  An Email value object.
 *
 * This is inspired by the wowo Email Value Object
 *
 * @link https://gist.github.com/wowo/b49ac45b975d5c489214
 * @link https://github.com/egulias/EmailValidator
 *
 *  @author      Adamo Crespi <hello@aerendir.me>
 *  @copyright   Copyright (c) 2015, Adamo Crespi
 *  @license     MIT License
 */
namespace SerendipityHQ\Component\ValueObjects\Email;

use Egulias\EmailValidator\EmailValidator;
use SerendipityHQ\Component\ValueObjects\Common\DisableWritingMethodsTrait;

/**
 * {@inheritdoc}
 */
class Email implements EmailInterface
{
    use DisableWritingMethodsTrait;

    /** @var string $email */
    private $email;

    /** @var  string $mailBox */
    private $mailBox;

    /** @var  string $host */
    private $host;

    /**
     * {@inheritdoc}
     *
     * @param string $value The email to set in the object
     */
    public function __construct($value)
    {
        $validator = new EmailValidator();

        if (!$validator->isValid($value)) {
            throw new \InvalidArgumentException(sprintf('The passed value "%s" does not look like an email.', $value));
        }

        $this->email = $value;

        list($this->mailBox, $this->host) = explode('@', $this->email);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * {@inheritdoc}
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * {@inheritdoc}
     */
    public function getMailBox()
    {
        return $this->mailBox;
    }

    /**
     * {@inheritdoc}
     */
    public function changeMailBox($newMailbox)
    {
        $copy = clone $this;
        $copy->mailBox = $newMailbox;
        $copy->email = $copy->mailBox . '@' . $copy->host;

        return $copy;
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
        return sprintf('%s@%s', $this->mailBox, $this->host);
    }
}
