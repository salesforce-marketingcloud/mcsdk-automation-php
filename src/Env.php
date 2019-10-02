<?php

namespace SalesForce\MarketingCloud;


/**
 * Class Env
 *
 * Mapping class for env variables
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
    const AUTHORIZATION_BASE_URL = "SFMC_AUTH_BASE_URL";
    const ACCESS_TOKEN_URL = "SFMC_ACCESS_TOKEN_URL";

    # Endpoint specific variables
    const SHORT_CODE = "SFMC_SHORT_CODE";
    const KEYWORD = "SFMC_KEYWORD";
    const COUNTRY_CODE = "SFMC_COUNTRY_CODE";
}