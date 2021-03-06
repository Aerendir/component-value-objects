*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

[Uri Documentation](../Uri.md)

# How to use Uri as a Doctrine type

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
            uri: 'SerendipityHQ\Component\ValueObjects\Uri\Bridge\Doctrine\UriType'
    ...
```

## STEP 2: Implement the Uri type in your entity

Implement the uri type in your entity:

```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Uri\UriInterface;

/**
 * @ORM\Entity()
 */
class User
{
    ...

    /**
     * @var UriInterface
     * @ORM\Column(type="uri")
     */
    private $website;

    ...
}
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
