<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2017 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
class AddressType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('countryCode', CountryType::class, ['label' => 'address.form.country_code.label', 'translation_domain' => 'address'])
            ->add('administrativeArea', TextType::class)
            ->add('locality', TextType::class)
            ->add('dependentLocality', TextType::class, ['required' => false])
            ->add('postalCode', TextType::class)
            ->add('street', TextType::class)
            ->add('extraLine', TextType::class, ['required' => false]);
    }
}
