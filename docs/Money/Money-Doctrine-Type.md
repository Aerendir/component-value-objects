[Money Documentation](../Money.md)

# How to use Money as a Doctrine type

*NOTE: You can read more about Doctrine's Embeddables here: [Types](https://www.doctrine-project.org/projects/doctrine-dbal/en/2.10/reference/types.html)*

To use the Doctrine's type, you have to follow those steps:

1. Register the type in your Symfony's configuration;
2. Implement the type in your entity.

## STEP 1: Register the type in your Symfony's configuration

Open the file `/config/pckages/doctrine.yaml`.

Add the type to the configuration:

```yaml
doctrine:
    dbal:
        ...
        types:
            money: 'SerendipityHQ\Component\ValueObjects\Money\Bridge\Doctrine\MoneyType'
    ...
```

## STEP 2: Implement the Money type in your entity

Implement the money type in your entity:

```php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use SerendipityHQ\Component\ValueObjects\Money\MoneyInterface;

/**
 * @ORM\Entity()
 */
class User
{
    ...

    /**
     * @var MoneyInterface
     * @ORM\Column(type="money")
     */
    private $balance;

    ...
}
```
