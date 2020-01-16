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

namespace SerendipityHQ\Component\ValueObjects\tests\Address;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Address\Address;
use SerendipityHQ\Component\ValueObjects\Address\AddressInterface;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;

/**
 * Tests the Address class.
 */
class AddressTest extends TestCase
{
    public function testAddress()
    {
        $values = [
            'countryCode'        => 'CN',
            'AdministrativeArea' => 'Taiwan',
            'Locality'           => 'Taichung City',
            'dependentLocality'  => 'Xitun District',
            'PostalCode'         => '407',
            'Street'             => 'Jingcheng Road, 27',
            'extraLine'          => 'Lane 50',
        ];

        $resource = new Address($values);

        // Test the value object direct interface
        $this::assertInstanceOf(AddressInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertSame($values['countryCode'], $resource->getCountryCode());
        $this::assertSame($values['AdministrativeArea'], $resource->getAdministrativeArea());
        $this::assertSame($values['Locality'], $resource->getLocality());
        $this::assertSame($values['dependentLocality'], $resource->getDependentLocality());
        $this::assertSame($values['PostalCode'], $resource->getPostalCode());
        $this::assertSame($values['Street'], $resource->getStreet());
        $this::assertSame($values['extraLine'], $resource->getExtraLine());
    }

    public function testToStringThrowsAnException()
    {
        $resource = new Address([]);

        $this::expectException(\RuntimeException::class);
        $resource->__toString();
    }
}
