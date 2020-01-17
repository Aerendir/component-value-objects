[Address Documentation](../Address.md)

# How to use the Symfony Form type

*NOTE: You can read more about Symfony form types here: [Forms > Form types](https://symfony.com/doc/current/forms.html#form-types)*

To use the form type you nedd to simply use it in your forms:

```php
use SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;
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
            ->add('address', AddressType::class, ['data_class' => AddressEmbeddable::class, 'translation_domain' => 'shq_address'])
            ...
    }

    ...
}
```

As you can see, we need to:

1. Use the `AddressType`;
2. Specify the `data_class` setting it to the `AddressEmbeddable`;
3. Specify the `translations_domain` to have the labels automatically translated.

WARNING: If the translation file for your language is missing, please, send a PR to add it!
