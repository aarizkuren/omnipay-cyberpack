<?php

namespace Omnipay\Cyberpac;

use Omnipay\Cyberpac\Constants\Language;
use Omnipay\Cyberpac\Constants\Parameter;
use Omnipay\Tests\GatewayTestCase;

class GatewayTest extends GatewayTestCase
{
    /** @var Gateway */
    protected $gateway;
    /** @var array */
    protected $options;

    public function setUp()
    {
        parent::setUp();

        $this->gateway = new Gateway($this->getHttpClient(), $this->getHttpRequest());

        $options = $this->gateway->getDefaultParameters();

        $options[Parameter::MERCHANT_CODE] = '0001';
        $options[Parameter::MERCHANT_URL] = 'http://url.com';
        $options[Parameter::SECRET_KEY] = 'secr3t';
        $options[Parameter::TEST_MODE] = true;

        $this->gateway->initialize($options);
    }

    public function testGetName()
    {
        $this->assertEquals('Cyberpac', $this->gateway->getName());
    }

    public function testTerminal()
    {
        $this->assertEquals('001', $this->gateway->getTerminal());
    }

    public function testTransactionType()
    {
        $this->assertEquals('0', $this->gateway->getTransactionType());
    }

    public function testSecretKey()
    {
        $this->assertEquals('secr3t', $this->gateway->getSecretKey());
    }

    public function testMerchantUrl()
    {
        $this->assertEquals('http://url.com', $this->gateway->getMerchantUrl());
    }

    public function testMerchantName()
    {
        $this->assertEquals('Omnipay', $this->gateway->getMerchantName());
    }

    public function testLanguage()
    {
        $this->assertEquals(Language::ES, $this->gateway->getLanguage());
    }

    public function testMerchantCode()
    {
        $this->assertEquals('0001', $this->gateway->getMerchantCode());
    }

    public function testCompletePurchaseRequest()
    {
        $this->assertInstanceOf(
            'Omnipay\Cyberpac\Message\CompletePurchaseRequest',
            $this->gateway->completePurchase()
        );
    }

    public function testPurchaseRequest()
    {
        $this->assertInstanceOf(
            'Omnipay\Cyberpac\Message\PurchaseRequest',
            $this->gateway->purchase()
        );
    }
}
