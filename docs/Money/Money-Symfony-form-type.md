*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

[Money Documentation](../Money.md)

# How to use the Symfony Form type

*NOTE: You can read more about Symfony form types here: [Forms > Form types](https://symfony.com/doc/current/forms.html#form-types)*

To use the form type you nedd to simply use it in your forms:

```php
use SerendipityHQ\Component\ValueObjects\Money\Bridge\Symfony\Form\Type\MoneyType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ...
            ->add('balance', MoneyType::class)
            ...
    }

    ...
}
```

The `MoneyType` from this package directly extends the built-in `MoneyType` form type provided by Symfony.

You can read more about it here: [`MoneyType` field](https://symfony.com/doc/current/reference/forms/types/money.html).

This means that you can use all the options you can use with the Symfony's `MoneyType` and the  PHPValueObjects' `MoneyType` will use them to create the `MoneyInterface` object.

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
