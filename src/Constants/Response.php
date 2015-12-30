<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 13:01
 */

namespace Omnipay\Cyberpac\Constants;

/**
 * Interface Response
 * @package Omnipay\Cyberpac\Constants
 */
interface Response
{
    const AMOUNT = 'Ds_Amount';
    const AUTHORISATION_CODE = 'Ds_AuthorisationCode';
    const CARD_COUNTRY = 'Ds_Card_Country';
    const CARD_TYPE = 'Ds_Card_Type';
    const CONSUMER_LANGUAGE = 'Ds_ConsumerLanguage';
    const CURRENCY = 'Ds_Currency';
    const DATE = 'Ds_Date';
    const EXPIRY_DATE = 'Ds_ExpiryDate';
    const HOUR = 'Ds_Hour';
    const IDENTIFIER = 'Ds_Merchant_Identifier';
    const MERCHANT_CODE = 'Ds_MerchantCode';
    const MERCHANT_DATA = 'Ds_MerchantData';
    const MERCHANT_PARAMS = 'Ds_MerchantParameters';
    const ORDER = 'Ds_Order';
    const RESPONSE = 'Ds_Response';
    const SECURE_PAYMENT = 'Ds_SecurePayment';
    const SIGNATURE = 'Ds_Signature';
    const TERMINAL = 'Ds_Terminal';
    const TRANSACTION_TYPE = 'Ds_TransactionType';
}