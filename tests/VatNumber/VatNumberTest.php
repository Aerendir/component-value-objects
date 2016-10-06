<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text
 */
namespace SerendipityHQ\Component\ValueObjects\tests\VatNumber;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\VatNumber\VatNumber;
use SerendipityHQ\Component\ValueObjects\VatNumber\VatNumberInterface;

/**
 * Tests the VatNumber Class.
 *
 * @since 2.3
 */
class VatNumberTest extends \PHPUnit_Framework_TestCase
{
    public function testVatNumber()
    {
        $testData = [
            'countryCode' => 'IT',
            'number' => '01234567891',
            'vatNumber' => 'IT01234567891'
        ];

        $resource = new VatNumber($testData);

        // Test the value object direct interface
        $this->assertInstanceOf(VatNumberInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this->assertEquals($testData['countryCode'], $resource->getCountryCode());
        $this->assertEquals($testData['number'], $resource->getNumber());
        $this->assertEquals($testData['vatNumber'], $resource->getVatNumber());
        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
    }

    public function testSetNumberAcceptsOnlyStrings()
    {
        $testData = [
            'countryCode' => 'IT',
            'number' => 12345678900,
            'vatNumber' => 'IT01234567891'
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new VatNumber($testData);
    }

    public function testSetVatNumberAcceptsOnlyStrings()
    {
        $testData = [
            'countryCode' => 'IT',
            'number' => 'IT01234567891',
            'vatNumber' => 12345678900
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new VatNumber($testData);
    }
}
