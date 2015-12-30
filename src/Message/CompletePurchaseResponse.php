<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 13:25
 */

namespace Omnipay\Cyberpac\Message;

use Guzzle\Http\EntityBody;
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
        /** @var EntityBody $d */
        $d = $this->data;
        $r = $d->getWrapperData();
        return (isset($r[self::RESPONSE]) && $r[self::RESPONSE] >= 0 && $r[self::RESPONSE] < 100);
    }
}