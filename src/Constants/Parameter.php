<?php
/**
 * User: asier
 * Date: 30/12/15
 * Time: 13:49
 */
namespace Omnipay\Cyberpac\Constants;

interface Parameter
{
    const CURRENCY = 'currency';
    const LANGUAGE = 'language';
    const MERCHANT_CODE = 'merchantCode';
    const MERCHANT_NAME = 'merchantName';
    const MERCHANT_URL = 'merchantUrl';
    const SECRET_KEY = 'secretKey';
    const TERMINAL = 'terminal';
    const TEST_MODE = 'testMode';
    const TRANSACTION_TYPE = 'transactionType';
}