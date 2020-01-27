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

namespace SerendipityHQ\Component\ValueObjects\Tests\Address\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;
use SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\Type\AddressType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests the AddressType class.
 */
class AddressTypeTest extends TypeTestCase
{
    public function testAddress()
    {
        $values = [
            'countryCode'        => 'IT',
            'administrativeArea' => 'Salerno',
            'locality'           => 'Naples',
            'dependentLocality'  => 'Dependent locality',
            'postalCode'         => '12345',
            'street'             => 'Via via vieni via con me',
            'extraLine'          => 'Niente più ti lega a questi luoghi',
        ];

        $objectToCompare = new AddressEmbeddable($values);
        $form            = $this->factory->create(AddressType::class, $objectToCompare, ['data_class' => null]);

        $object = new AddressEmbeddable($values);

        // submit the data to the form directly
        $form->submit($values);

        $this::assertTrue($form->isSynchronized());

        // check that $objectToCompare was modified as expected when the form was submitted
        $this::assertEquals($object, $objectToCompare);

        $view     = $form->createView();
        $children = $view->children;

        foreach (array_keys($values) as $key) {
            $this::assertArrayHasKey($key, $children);
        }
    }

    public function testAddressWithNullValues()
    {
        $values = [
            'countryCode'        => 'IT',
            'administrativeArea' => 'Salerno',
            'locality'           => 'Naples',
            'dependentLocality'  => 'Dependent locality',
            'postalCode'         => '12345',
            'street'             => 'Via via vieni via con me',
            'extraLine'          => 'Niente più ti lega a questi luoghi',
        ];

        $objectToCompare = new AddressEmbeddable($values);
        $form            = $this->factory->create(AddressType::class, null, ['data_class' => null]);

        $object = new AddressEmbeddable($values);

        // submit the data to the form directly
        $form->submit($values);

        $this::assertTrue($form->isSynchronized());
    }
}
