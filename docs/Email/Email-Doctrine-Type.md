[Email Documentation](../Email.md)

# How to use Email as a Doctrine type

*NOTE: You can read more about Doctrine's Embeddables here: [Types](https://www.doctrine-project.org/projects/doctrine-dbal/en/2.10/reference/types.html)*

To use the Doctrine's type, you have to follow those steps:

1. Register the type in your Symfony's configuration;
2. Implement the type in your entity.

## STEP 1: Register the type in your Symfony's configuration

Open the file `/config/packages/doctrine.yaml`.

Add the type to the configuration:

```yaml
doctrine:
    dbal:
        ...
        types:
            email: 'SerendipityHQ\Component\ValueObjects\Email\Bridge\Doctrine\EmailType'
    ...
```

## STEP 2: Implement the Email type in your entity

Implement the email type in your entity:

```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Email\EmailInterface;

/**
 * @ORM\Entity()
 */
class User
{
    ...

    /**
     * @var EmailInterface
     * @ORM\Column(type="email")
     */
    private $email;

    ...
}
```
