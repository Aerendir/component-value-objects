*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*

[Address Documentation](../Address.md)

# How to use the Symfony Form type

*NOTE: You can read more about Symfony form types here: [Forms > Form types](https://symfony.com/doc/current/forms.html#form-types)*

To use the form type you nedd to simply use it in your forms:

```php
use SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\Type\AddressType;
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
            ->add('address', AddressType::class)
            ...
    }

    ...
}
```

WARNING: If the translation file for your language is missing, please, send a PR to add it!

Supported languages are:

- EN
- IT

*Do you like this library? [**Leave a &#9733;**](#js-repo-pjax-container) or run `composer global require symfony/thanks && composer thanks` to say thank you to all libraries you use in your current project, this included!*
