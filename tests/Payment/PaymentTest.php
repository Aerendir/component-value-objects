<?php

/**
 *    @author      Aerendir <hello@aerendir.me>
 *    @copyright   Copyright (C) 2014 SerendipityHQ. All rights reserved.
 *    @license     SECRETED. No distribution, no copy, no derivative or any other activity or action that could disclose this text.
 */
namespace SerendipityHQ\Component\ValueObjects\Tests\Payment;

use SerendipityHQ\Component\ValueObjects\Payment\Payment;
use SerendipityHQ\Component\ValueObjects\Payment\PaymentInterface;

/**
 * Tests the Payment Class.
 */
class PaymentTest extends \PHPUnit_Framework_TestCase
{
    public function testPaymentImplementsPaymentInterface()
    {
        $resource = new Payment();

        $this->assertInstanceOf(PaymentInterface::class, $resource, 'Payment doesn\'t implement PaymentInterface but should.');
    }

    public function testPayment()
    {
        // Of AddressModel
        $testData = [
            'name'   => 'PayPal',
            'status' => 'A random status',
        ];

        $resource = new Payment();

        $resource->setName($testData['name']);
        $resource->setStatus($testData['status']);

        $this->assertEquals($testData['name'],   $resource->getName());
        $this->assertEquals($testData['status'], $resource->getStatus());
    }
}
