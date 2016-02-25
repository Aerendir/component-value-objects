<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Tax;

use SerendipityHQ\Component\ValueObjects\Money\Money;
use SerendipityHQ\Component\ValueObjects\Tax\Tax;
use SerendipityHQ\Component\ValueObjects\Tax\TaxInterface;

/**
 * Tests the Tax Class.
 *
 * @since Alpha
 */
class TaxTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Tax $resource The testing object. */
    private $resource;

    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        $this->resource = new Tax();
    }

    public function testTaxImplementsTaxInterface()
    {
        $this->assertInstanceOf(TaxInterface::class, $this->resource, 'Tax doesn\'t implement TaxInterface but should.');
    }

    public function testTax()
    {
        $testData = [
            'amount'   => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'code'     => 'IVA IT',
            'compound' => $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock(),
            'rate'     => 22.0,
            'title'    => 'IVA IT',
        ];

        $this->resource->setAmount($testData['amount']);
        $this->resource->setCode($testData['code']);
        $this->resource->setCompound($testData['compound']);
        $this->resource->setRate($testData['rate']);
        $this->resource->setTitle($testData['title']);

        $this->assertEquals($testData['amount'],   $this->resource->getAmount());
        $this->assertEquals($testData['code'],     $this->resource->getCode());
        $this->assertEquals($testData['compound'], $this->resource->getCompound());
        $this->assertEquals($testData['rate'],     $this->resource->getRate());
        $this->assertEquals($testData['title'],    $this->resource->getTitle());
    }

    public function testSetRateAcceptsOnlyFloats()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->resource->setRate(33);
    }

    /**
     * {@inheritdoc}
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->resource);
    }
}
