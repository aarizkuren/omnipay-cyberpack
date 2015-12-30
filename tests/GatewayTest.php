<?php

namespace Omnipay\Cyberpac;

use Omnipay\Tests\GatewayTestCase;
use Omnipay\Common\CreditCard;

class GatewayTest extends GatewayTestCase
{
    /** @var Gateway */
    protected $gateway;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $this->options = array(
            'amount' => '10.00',
            'card' => new CreditCard(array(
                'firstName' => 'Example',
                'lastName' => 'User',
                'number' => '4111111111111111',
                'expiryMonth' => '12',
                'expiryYear' => '2016',
                'cvv' => '123',
            )),
        );
    }
}
