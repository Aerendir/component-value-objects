<?php

/*
 * This file is part of PHP Value Objects.
 *
 * Copyright Adamo Aerendir Crespi 2015-2017.
 *
 * @author    Adamo Aerendir Crespi <hello@aerendir.me>
 * @copyright Copyright (C) 2015 - 2020 Aerendir. All rights reserved.
 * @license   MIT
 */

namespace SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\DataTransformer\AddressTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * @author Adamo Crespi <hello@aerendir.me>
 */
final class AddressType extends AbstractType
{
    /**
     * @var string
     */
    private const LABEL = 'label';
    /**
     * @var string
     */
    private const TRANSLATION_DOMAIN = 'translation_domain';
    /**
     * @var string
     */
    private const SHQ_ADDRESS = 'shq_address';
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addModelTransformer(new AddressTransformer())
            ->add('countryCode', CountryType::class, [self::LABEL => 'shq.address.form.country_code.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('administrativeArea', TextType::class, [self::LABEL => 'shq.address.form.administrative_area.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('locality', TextType::class, [self::LABEL => 'shq.address.form.locality.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('dependentLocality', TextType::class, ['required' => false, self::LABEL => 'shq.address.form.dependent_locality.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('postalCode', TextType::class, [self::LABEL => 'shq.address.form.postal_code.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('street', TextType::class, [self::LABEL => 'shq.address.form.street.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS])
            ->add('extraLine', TextType::class, ['required' => false, self::LABEL => 'shq.address.form.extra_line.label', self::TRANSLATION_DOMAIN => self::SHQ_ADDRESS]);
    }
}
