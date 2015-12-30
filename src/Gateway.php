<?php

namespace Omnipay\Cyberpack;

use Omnipay\Common\AbstractGateway;
use Omnipay\Cyberpac\Constants\Language;

/**
 * Skeleton Gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Cyberpac';
    }

    public function getDefaultParameters()
    {
        return [
            'language' => Language::ES,
            'merchantCode' => '',
            'merchantName' => 'Omnipay',
            'secretKey' => '',
            'terminal' => 1,
            'testMode' => false,
        ];
    }

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }

    public function setMerchantCode($value)
    {
        return $this->setParameter('merchantCode', $value);
    }

    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function setSecretKey($value)
    {
        return $this->setParameter('secretKey', $value);
    }

    public function getTerminal()
    {
        return $this->getParameter('terminal');
    }

    public function setTerminal($value)
    {
        return $this->setParameter('terminal', $value);
    }

    public function getPayMethods()
    {
        return $this->getParameter('payMethods');
    }

    public function setPayMethods($value)
    {
        return $this->setParameter('payMethods', $value);
    }

    public function purchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cyberpac\Message\PurchaseRequest', $parameters);
    }

    public function completePurchase(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cyberpac\Message\CompletePurchaseRequest', $parameters);
    }
}
