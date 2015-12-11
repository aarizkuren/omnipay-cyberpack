<?php
/**
 * Created by PhpStorm.
 * User: asier
 * Date: 11/12/15
 * Time: 12:39
 */

namespace Omnipay\Message;


use Omnipay\Common\Exception\InvalidResponseException;
use Omnipay\Cyberpack\Constants\Response;

class CompletePurchaseRequest extends PurchaseRequest
{
    public function checkSignature($data, $signature)
    {
        $json = json_encode($data);
        $encodedJson = base64_encode($json);

        $key = $this->generateKey($data[Response::ORDER], $this->getSecretKey());

        $generatedSig = $this->generateSignature($encodedJson, $key);

        $newSignature = strtr(base64_encode($generatedSig), '+/', '-_');

        return $newSignature == $signature;
    }

    public function getData()
    {
        $query = $this->httpRequest->request;

        $signature = $query->get(Response::SIGNATURE);

        $params = $query->get(Response::MERCHANT_PARAMS);
        $params = base64_decode(strtr($params, '-_', '+/'));
        $params = json_decode($params, true);

        if (!$this->checkSignature($params, $signature)) {
            throw new InvalidResponseException('Invalid signature: ' . $signature);
        }

        return $params;
    }

    public function sendData($data)
    {
        return $this->response = new CompletePurchaseResponse($this, $data);
    }
}