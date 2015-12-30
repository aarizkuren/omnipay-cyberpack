<?php
/**
 * User: asier
 * Date: 30/12/15
 * Time: 10:05
 */
namespace Omnipay\Cyberpac\Message;

use Omnipay\Cyberpac\Constants\Currency;
use Omnipay\Tests\TestCase;

class CompletePurchaseRequestTest extends TestCase
{
    /** @var CompletePurchaseRequest */
    private $request;

    public function setUp()
    {
        parent::setUp();

        $this->request = new CompletePurchaseRequest($this->getHttpClient(), $this->getHttpRequest());
        $this->request->initialize([
            'amount' => '2.00',
            'currency' => Currency::EURO,
            'card' => $this->getValidCard(),
        ]);
    }
}