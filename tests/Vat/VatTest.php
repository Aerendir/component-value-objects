<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Tax;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Common\SimpleValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Tax\TaxInterface;
use SerendipityHQ\Component\ValueObjects\Vat\Vat;
use SerendipityHQ\Component\ValueObjects\Vat\VatInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
class VatTest extends \PHPUnit_Framework_TestCase
{
    public function testTax()
    {
        $testData = [
            'countryCode' => 'IT',
            'percentage'  => 22.0000
        ];

        $resource = new Vat($testData['countryCode']);

        // Test the value object direct interface
        $this->assertInstanceOf(VatInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(SimpleValueObjectInterface::class, $resource);
        
        $this->assertEquals($testData['countryCode'], $resource->getCountryCode());
        $this->assertEquals($testData['percentage'], $resource->getPercentage());
        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
    }

    public function testSetRateAcceptsOnlyFloats()
    {
        $testData = [
            'code' => 'IVA IT',
            'compound' => false,
            'rate' => 22,
            'taxAmount' => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'title' => 'IVA IT',
        ];

        $this->expectException(\InvalidArgumentException::class);
        $resource = new Tax($testData);
    }
}
