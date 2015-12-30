<?php
/**
 * User: asier
 * Date: 11/12/15
 * Time: 11:01
 */

namespace Omnipay\Cyberpac\Constants;

/**
 * Constants to use on Requests
 *
 * Interface Request
 * @package Omnipay\Cyberpac\Constants
 */
interface Request
{
    const URL_PRODUCTION = 'https://sis.redsys.es/sis/realizarPago';
    const URL_TEST = 'https://sis-t.redsys.es:25443/sis/realizarPago';
    const SIGNATURE_VERSION = 'HMAC_SHA256_V1';

    const PARAM_SIGNATURE_VERSION = 'DS_SignatureVersion';
    const PARAM_MERCHANT_PARAMETERS = 'DS_MerchantParameters';
    const PARAM_SIGNATURE = 'DS_Signature';

    const AMOUNT = 'DS_MERCHANT_AMOUNT';
    const AUTHORISATION_CODE = 'DS_MERCHANT_AUTHORISATIONCODE';
    const CARD = 'DS_MERCHANT_PAN';
    const CHARGE_EXPIRY_DATE = 'DS_MERCHANT_CHARGEEXPIRYDATE';
    const CLIENT_IP = 'DS_MERCHANT_CLIENTIP';
    const CONSUMER_LANGUAGE = 'DS_MERCHANT_CONSUMERLANGUAGE';
    const CURRENCY = 'DS_MERCHANT_CURRENCY';
    const CVV2 = 'DS_MERCHANT_CVV2';
    const DATE_FRECUENCY = 'DS_MERCHANT_DATEFRECUENCY';
    const DIRECT_PAYMENT = 'DS_MERCHANT_DIRECTPAYMENT';
    const EXPIRY_DATE = 'DS_MERCHANT_EXPIRYDATE';
    const IDENTIFIER = 'DS_MERCHANT_IDENTIFIER';
    const MERCHANT_CODE = 'DS_MERCHANT_MERCHANTCODE';
    const MERCHANT_DATA = 'DS_MERCHANT_MERCHANTDATA';
    const MERCHANT_NAME = 'DS_MERCHANT_MERCHANTNAME';
    const MERCHANT_SIGNATURE = 'DS_MERCHANT_MERCHANTSIGNATURE';
    const MERCHANT_URL = 'DS_MERCHANT_MERCHANTURL';
    const ORDER = 'DS_MERCHANT_ORDER';
    const PRODUCT_DESCRIPTION = 'DS_MERCHANT_PRODUCTDESCRIPTION';
    const SUM_TOTAL = 'DS_MERCHANT_SUMTOTAL';
    const TERMINAL = 'DS_MERCHANT_TERMINAL';
    const TITULAR = 'DS_MERCHANT_TITULAR';
    const TRANSACTION_TYPE = 'DS_MERCHANT_TRANSACTIONTYPE';
    const URL_KO = 'DS_MERCHANT_URLKO';
    const URL_OK = 'DS_MERCHANT_URLOK';

}