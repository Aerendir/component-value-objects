*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

[Address Documentation](../Address.md)

# How to use the Address Embeddable

*NOTE: You can read more about Doctrine's Embeddables here: [Separating Concerns using Embeddables](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/embeddables.html)*

To use the Doctrine's embeddable, you have to follow those steps:

1. Register the embeddable in your Symfony's configuration;
2. Implement the type in your entity.

## STEP 1: Register the embeddable in your Symfony's configuation

Open the file `/config/packages/doctrine.yaml`.

Add the embeddable to the configuration:

```yaml
doctrine:
    ...
    orm:
        ...
        mappings:
            ...
            address:
                is_bundle: false
                type: annotation
                mapping: true
                dir: "%kernel.project_dir%/vendor/serendipity_hq/php_value_objects/src/Address"
                prefix: 'SerendipityHQ\Component\ValueObjects'
                alias: Address
```

## STEP 2: Implement the Address embeddable in your entity

In your entity:

```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;

/**
 * @ORM\Entity()
 */
class User
{
    ...

    /**
     * @var AddressEmbeddable
     * @ORM\Embedded(class="\SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable")
     */
    private $address;


}
```

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
