<?php

/*
 * This file is part of the Serendipity HQ Value Objects Component.
 *
 * Copyright (c) Adamo Aerendir Crespi <aerendir@serendipityhq.com>.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SerendipityHQ\Component\ValueObjects\Tests\Address\Bridge\Symfony\Form\Type;

use SerendipityHQ\Component\ValueObjects\Address\Bridge\Doctrine\AddressEmbeddable;
use SerendipityHQ\Component\ValueObjects\Address\Bridge\Symfony\Form\Type\AddressType;
use Symfony\Component\Form\Test\TypeTestCase;

/**
 * Tests the AddressType class.
 */
final class AddressTypeTest extends TypeTestCase
{
    public function testAddress(): void
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

        self::assertTrue($form->isSynchronized());

        // check that $objectToCompare was modified as expected when the form was submitted
        self::assertEquals($object, $objectToCompare);

        $view     = $form->createView();
        $children = $view->children;

        foreach (\array_keys($values) as $key) {
            self::assertArrayHasKey($key, $children);
        }
    }

    public function testAddressWithNullValues(): void
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

        $form = $this->factory->create(AddressType::class, null, ['data_class' => null]);

        // submit the data to the form directly
        $form->submit($values);

        self::assertTrue($form->isSynchronized());
    }
}
