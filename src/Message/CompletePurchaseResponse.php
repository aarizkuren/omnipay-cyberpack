<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 13:25
 */

namespace Omnipay\Cyberpac\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Cyberpac\Constants\Response;

/**
 * Class CompletePurchaseResponse
 * @package Omnipay\Cyberpac\Message
 */
class CompletePurchaseResponse extends AbstractResponse implements Response
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        $d = $this->data;
        return (isset($d[self::RESPONSE]) && $d[self::RESPONSE] >= 0 && $d[self::RESPONSE] < 100);
    }
}