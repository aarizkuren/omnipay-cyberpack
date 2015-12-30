<?php

namespace Omnipay\Cyberpac\Message;

use Omnipay\Tests\TestCase;

class CompletePurchaseResponseTest extends TestCase
{
    public function testConstruct()
    {
        // response should decode URL format data
        $response = new CompletePurchaseResponse($this->getMockRequest(), 'example=value&foo=bar');
        $this->assertEquals(array('example' => 'value', 'foo' => 'bar'), $response->getData());
    }

    public function testProPurchaseSuccess()
    {
        $httpResponse = $this->getMockHttpResponse('AuthorizeSuccess.txt');
        $response = new CompletePurchaseResponse($this->getMockRequest(), $httpResponse->getBody());

        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('1234', $response->getTransactionReference());
        $this->assertNull($response->getMessage());
    }
}
