<?php
/**
 * Created by PhpStorm.
 * User: asier
 * Date: 11/12/15
 * Time: 12:02
 */

namespace Omnipay\Cyberpack\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Cyberpack\Constants\Request;
use Omnipay\Cyberpack\Constants\TransactionType;

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

        $amount = str_replace('.', '', $this->getAmount());
        $card = $this->getCard();

        $data = [
            self::AMOUNT => $amount,
            self::CURRENCY => $this->getCurrencyNumeric(),
            self::ORDER => $this->getMerchantOrder(),
            self::PRODUCT_DESCRIPTION => $this->getDescription(),
            self::TITULAR => $card->getName(),
            self::MERCHANT_CODE => $this->getMerchantCode(),
            self::MERCHANT_URL => $this->getNotifyUrl(),
            self::URL_OK => $this->getReturnUrl(),
            self::URL_KO => $this->getCancelUrl(),
            self::MERCHANT_NAME => $this->getMerchantName(),
            self::CONSUMER_LANGUAGE => $this->getLanguage(),
            self::TERMINAL => $this->getTerminal(),
            self::MERCHANT_DATA => $this->getExtraData(),
            self::TRANSACTION_TYPE => TransactionType::AUTHORIZATION,
            self::AUTHORISATION_CODE => $this->getAuthorisationCode(),
        ];

        $json = json_encode($data);

        return [
            self::PARAM_SIGNATURE_VERSION => self::SIGNATURE_VERSION,
            self::PARAM_MERCHANT_PARAMETERS => base64_encode($json),
            self::PARAM_SIGNATURE => $this->createSignature($json),
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

    public function getMerchantCode()
    {
        return $this->getParameter('merchantCode');
    }


    public function getSecretKey()
    {
        return $this->getParameter('secretKey');
    }

    public function getTerminal()
    {
        return $this->getParameter('terminal');
    }

    public function getMerchantName()
    {
        return $this->getParameter('merchantName');
    }

    public function getLanguage()
    {
        return $this->getParameter('language');
    }

    public function getExtraData()
    {
        return $this->getParameter('extraData');
    }

    public function getAuthorisationCode()
    {
        return $this->getParameter('authorisationCode');
    }

    public function getPayMethods()
    {
        return $this->getParameter('payMethods');
    }

    public function getMerchantOrder()
    {
        return str_pad($this->getTransactionId(), 12, '0', STR_PAD_LEFT);
    }

    public function createSignature($json)
    {
        $key = $this->generateKey($this->getMerchantOrder(), $this->getSecretKey());

        return $this->generateSignature($json, $key);
    }

    public function generateSignature($encodedJson, $key)
    {
        // MAC256
        $signature = hash_hmac('sha256', $encodedJson, $key, true);

        return base64_encode($signature);
    }

    protected function generateKey($data, $key)
    {
        $codedKey = base64_decode($key);
        $key = $this->encrypt($data, $codedKey);

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