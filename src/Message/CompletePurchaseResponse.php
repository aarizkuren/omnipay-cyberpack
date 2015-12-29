<?php
/**
 * Created by PhpStorm.
 * User: asier
 * Date: 11/12/15
 * Time: 13:25
 */

namespace Omnipay\Cyberpack\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Cyberpack\Constants\Response;

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