<?php

namespace Omnipay\Cyberpack;

use Omnipay\Common\AbstractGateway;

/**
 * Skeleton Gateway
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'Cyberpack';
    }

    public function getDefaultParameters()
    {
        return [
            'key' => '',
            'testMode' => false,
        ];
    }

    public function getKey()
    {
        return $this->getParameter('key');
    }

    public function setKey($value)
    {
        return $this->setParameter('key', $value);
    }

    /**
     * @param array $parameters
     *
     * @return Message\AuthorizeRequest
     */
    public function authorize(array $parameters = [])
    {
        return $this->createRequest('\Omnipay\Cyberpack\Message\AuthorizeRequest', $parameters);
    }
}
