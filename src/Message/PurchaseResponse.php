<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 12:31
 */

namespace Omnipay\Cyberpac\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Class PurchaseResponse
 * @package Omnipay\Cyberpac\Message
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return false;
    }

    public function isRedirect()
    {
        return true;
    }

    /**
     * Gets the redirect target url.
     *
     * @return string
     */
    public function getRedirectUrl()
    {
        return $this->request->getEndpoint();
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod()
    {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData()
    {
        return $this->getData();
    }
}