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
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('countryCode', CountryType::class, ['label' => 'shq.address.form.country_code.label', 'translation_domain' => 'shq_address'])
            ->add('administrativeArea', TextType::class, ['label' => 'shq.address.form.administrative_area.label', 'translation_domain' => 'shq_address'])
            ->add('locality', TextType::class, ['label' => 'shq.address.form.locality.label', 'translation_domain' => 'shq_address'])
            ->add('dependentLocality', TextType::class, ['required' => false, 'label' => 'shq.address.form.dependent_locality.label', 'translation_domain' => 'shq_address'])
            ->add('postalCode', TextType::class, ['label' => 'shq.address.form.postal_code.label', 'translation_domain' => 'shq_address'])
            ->add('street', TextType::class, ['label' => 'shq.address.form.street.label', 'translation_domain' => 'address'])
            ->add('extraLine', TextType::class, ['required' => false, 'label' => 'shq.address.form.extra_line.label', 'translation_domain' => 'shq_address']);
    }
}
