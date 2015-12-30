<?php
/**
 * User: asier
 * Date: 30/12/15
 * Time: 10:05
 */
namespace Omnipay\Cyberpac\Message;

use Omnipay\Cyberpac\Constants\Currency;
use Omnipay\Cyberpac\Constants\Language;
use Omnipay\Cyberpac\Constants\Parameter;
use Omnipay\Cyberpac\Constants\TransactionType;
use Omnipay\Tests\TestCase;

class CompletePurchaseRequestTest extends TestCase
{
    /** @var CompletePurchaseRequest */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $r = new CompletePurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $options = [
            'amount' => '2.00',
            Parameter::CURRENCY => Currency::EURO,
            $r::PARAM_ORDER=> 'lalala',
            $r::PARAM_PRODUCT_DESCRIPTION => 'description',
            $r::PARAM_TITULAR => 'Fulanito',
            Parameter::LANGUAGE => Language::ES,
            Parameter::MERCHANT_CODE => '001',
            Parameter::MERCHANT_NAME => 'Cyberpac',
            Parameter::MERCHANT_URL => 'http://test.com',
            Parameter::TERMINAL => '001',
            Parameter::TRANSACTION_TYPE => TransactionType::AUTHORIZATION,
            $r::PARAM_URL_OK => 'http://ok.com',
            $r::PARAM_URL_KO => 'http://ko.com',
        ];
        $this->request = $r;

        $this->request->initialize($options);
    }

    public function testTitular()
    {
        $this->assertEquals('Fulanito', $this->request->getTitular());
        $this->request->setTitular('Menganito');
        $this->assertEquals('Menganito', $this->request->getTitular());
    }

    public function testAmount()
    {
        $this->assertEquals('2.00', $this->request->getAmount());
        $this->request->setAmount('4.00');
        $this->assertEquals('4.00', $this->request->getAmount());
    }
}