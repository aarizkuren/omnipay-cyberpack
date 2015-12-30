<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 12:02
 */

namespace Omnipay\Cyberpac\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Cyberpac\Constants\Parameter;
use Omnipay\Cyberpac\Constants\Request;
use Omnipay\Cyberpac\Constants\TransactionType;

/**
 * Class PurchaseRequest
 * @package Omnipay\Cyberpac\Message
 */
class PurchaseRequest extends AbstractRequest implements Request
{
    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     */
    public function getData()
    {
        $this->validate('amount', 'currency', 'transactionId', 'merchantCode', 'terminal');

        $data = [
            self::AMOUNT => $this->getAmount(),
            self::CURRENCY => $this->getCurrency(),
            self::ORDER => $this->getToken(),
            self::PRODUCT_DESCRIPTION => $this->getDescription(),
            self::TITULAR => $this->getTitular(),
            self::CONSUMER_LANGUAGE => $this->getLanguage(),
            self::MERCHANT_CODE => $this->getMerchantCode(),
            self::MERCHANT_NAME => $this->getMerchantName(),
            self::MERCHANT_URL => $this->getNotifyUrl(),
            self::URL_OK => $this->getReturnUrl(),
            self::URL_KO => $this->getCancelUrl(),
            self::TERMINAL => $this->getTerminal(),
            self::TRANSACTION_TYPE => TransactionType::AUTHORIZATION,
        ];

        $codedData = base64_encode(json_encode($data));

        return [
            self::PARAM_SIGNATURE_VERSION => self::SIGNATURE_VERSION,
            self::PARAM_MERCHANT_PARAMETERS => $codedData,
            self::PARAM_SIGNATURE => $this->createSignature($codedData),
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getLanguage()
    {
        return $this->getParameter(Parameter::LANGUAGE);
    }

    public function getMerchantCode()
    {
        return $this->getParameter(Parameter::MERCHANT_CODE);
    }

    public function getMerchantName()
    {
        return $this->getParameter(Parameter::MERCHANT_NAME);
    }

    public function getSecretKey()
    {
        return $this->getParameter(Parameter::SECRET_KEY);
    }

    public function getTerminal()
    {
        return $this->getParameter(Parameter::TERMINAL);
    }

    public function getTitular()
    {
        return $this->getParameter(self::PARAM_TITULAR);
    }

    public function setTitular($titular)
    {
        return $this->setParameter(self::PARAM_TITULAR, $titular);
    }

    public function getMerchantOrder()
    {
        return str_pad($this->getTransactionId(), 12, '0', STR_PAD_LEFT);
    }

    public function createSignature($codedData)
    {
        $key = $this->generateKey($this->getToken(), $this->getSecretKey());

        return $this->generateSignature($codedData, $key);
    }

    protected function generateSignature($codedData, $key)
    {
        // MAC256
        $signature = hash_hmac('sha256', $codedData, $key, true);

        return base64_encode($signature);
    }

    protected function generateKey($token, $key)
    {
        $key = $this->encrypt($token, base64_decode($key));

        return $key;
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? self::URL_TEST : self::URL_PRODUCTION;
    }

    protected function encrypt($message, $key)
    {
        $bytes = array_fill(0, 8, 0);
        $iv = implode(array_map("chr", $bytes));

        $text = mcrypt_encrypt(MCRYPT_3DES, $key, $message, MCRYPT_MODE_CBC, $iv);

        return $text;
    }
}