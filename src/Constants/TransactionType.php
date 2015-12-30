<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 11:41
 */

namespace Omnipay\Cyberpac\Constants;

/**
 * CyberPack transaction types
 *
 * Interface Transaction
 * @package Omnipay\Cyberpac\Constants
 */
interface TransactionType
{
    const AUTHORIZATION = 0; // normal transaction

    const CREATE_SUBSCRIPTION = 5; // initial transaction for subscribe
    const RENEW_SUBSCRIPTION = 6; // renew subscription
    const CANCEL_SUBSCRIPTION = null; // cancel subscription

    const CARD_INITIAL = 'L'; // initial transaction for card on file
    const CARD_SUCCESSIVE = 'M'; // successive transaction for card on file
}