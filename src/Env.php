<?php

namespace SalesForce\MarketingCloud;


/**
 * Class Env
 *
 * Mapping class for env variabless
 *
 * @package SalesForce\MarketingCloud
 */
final class Env
{
    # Debug
    const FIDDLER_ENABLED = "SFMC_FIDDLER_ENABLE";

    # API setup variables
    const ACCOUNT_ID = "SFMC_ACCOUNT_ID";
    const CLIENT_ID = "SFMC_CLIENT_ID";
    const CLIENT_SECRET = "SFMC_CLIENT_SECRET";
    const URL_AUTHORIZE = "SFMC_AUTH_BASE_URL";
    const URL_ACCESS_TOKEN = self::URL_AUTHORIZE;

    # Endpoint specific variables
    const SHORT_CODE = "SFMC_SHORT_CODE";
    const KEYWORD = "SFMC_KEYWORD";
    const COUNTRY_CODE = "SFMC_COUNTRY_CODE";
}