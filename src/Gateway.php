<?php

namespace Omnipay\Cyberpac;

use Omnipay\Common\AbstractGateway;
use Omnipay\Cyberpac\Constants\Currency;
use Omnipay\Cyberpac\Constants\Language;
use Omnipay\Cyberpac\Constants\Parameter;
use Omnipay\Cyberpac\Constants\TransactionType;

/**
 * Cyberpac Gateway
 */
class Gateway extends AbstractGateway implements Parameter
{
    public function getName()
    {
        return 'Cyberpac';
    }

    public function getDefaultParameters()
    {
        return [
            //self::CURRENCY => Currency::EURO,
            self::LANGUAGE => Language::ES,
            self::MERCHANT_CODE => '',
            self::MERCHANT_NAME => 'Omnipay',
            self::MERCHANT_URL => '',
            self::SECRET_KEY => '',
            self::TERMINAL => '001',
            self::TEST_MODE => false,
            self::TRANSACTION_TYPE => TransactionType::AUTHORIZATION,
        ];
    }

    public function getLanguage()
    {
        return $this->getParameter(self::LANGUAGE);
    }

    public function setLanguage($language)
    {
        return $this->setParameter(self::LANGUAGE, $language);
    }

    public function getMerchantCode()
    {
        return $this->getParameter(self::MERCHANT_CODE);
    }

    public function setMerchantCode($merchantCode)
    {
        return $this->setParameter(self::MERCHANT_CODE, $merchantCode);
    }

    public function getMerchantName()
    {
        return $this->getParameter(self::MERCHANT_NAME);
    }

    public function setMerchantName($merchantName)
    {
        return $this->setParameter(self::MERCHANT_NAME, $merchantName);
    }

    public function getMerchantUrl()
    {
        return $this->getParameter(self::MERCHANT_URL);
    }

    public function setMerchantUrl($merchantUrl)
    {
        return $this->setParameter(self::MERCHANT_URL, $merchantUrl);
    }

    public function getSecretKey()
    {
        return $this->getParameter(self::SECRET_KEY);
    }

    public function setSecretKey($secretKey)
    {
        return $this->setParameter(self::SECRET_KEY, $secretKey);
    }

    public function getTerminal()
    {
        return $this->getParameter(self::TERMINAL);
    }

    public function setTerminal($terminal)
    {
        return $this->setParameter(self::TERMINAL, $terminal);
    }

    public function getTransactionType()
    {
        return $this->getParameter(self::TRANSACTION_TYPE);
    }

    public function setTransactionType($transactionType)
    {
        return $this->setParameter(self::TRANSACTION_TYPE, $transactionType);
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
