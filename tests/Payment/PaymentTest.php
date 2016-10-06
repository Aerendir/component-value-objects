<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text
 */
namespace SerendipityHQ\Component\ValueObjects\tests\Payment;

use SerendipityHQ\Component\ValueObjects\Common\ComplexValueObjectInterface;
use SerendipityHQ\Component\ValueObjects\Payment\Payment;
use SerendipityHQ\Component\ValueObjects\Payment\PaymentInterface;

/**
 * Tests the Payment Class.
 */
class PaymentTest extends \PHPUnit_Framework_TestCase
{
    public function testPayment()
    {
        // Of AddressModel
        $testData = [
            'name' => 'PayPal',
            'status' => 'A random status',
        ];

        $resource = new Payment($testData);

        // Test the value object direct interface
        $this->assertInstanceOf(PaymentInterface::class, $resource);

        // Test the type of value object interface
        $this->assertInstanceOf(ComplexValueObjectInterface::class, $resource);

        $this->assertEquals($testData['name'], $resource->getName());
        $this->assertEquals($testData['status'], $resource->getStatus());
        $this->assertTrue(is_string($resource->__toString()));
        $this->assertTrue(is_string($resource->toString()));
    }
}
