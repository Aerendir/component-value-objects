<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Tax;

use PHPUnit\Framework\TestCase;
use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Tax\TaxInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
class TaxTest extends TestCase
{
    public function testTax()
    {
        $testData = [
            'code' => 'IVA IT',
            'compound' => false,
            'rate' => 22.0,
            'taxAmount' => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'title' => 'IVA IT',
        ];

        $resource = new Tax($testData);

        // Test the value object direct interface
        $this::assertInstanceOf(TaxInterface::class, $resource);

        // Test the type of value object interface
        $this::assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this::assertEquals($testData['code'], $resource->getCode());
        $this::assertEquals($testData['compound'], $resource->getCompound());
        $this::assertEquals($testData['rate'], $resource->getRate());
        $this::assertEquals($testData['taxAmount'], $resource->getTaxAmount());
        $this::assertEquals($testData['title'], $resource->getTitle());
        $this::assertTrue(is_string($resource->__toString()));
        $this::assertTrue(is_string($resource->toString()));
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
