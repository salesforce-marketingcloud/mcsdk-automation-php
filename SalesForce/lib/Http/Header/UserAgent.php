<?php

namespace SalesForce\MarketingCloud\Http\Header;

use SalesForce\MarketingCloud\Api\Client;
use SalesForce\MarketingCloud\System\SystemInformationProvider;

/**
 * Class UserAgent
 *
 * @package SalesForce\MarketingCloud\Http\Header
 */
class UserAgent
{
    /**
     * Returns the UserAgent string based on the system information
     *
     * @return string
     */
    public static function fromSysInfo(): string
    {
        $data = [
            "sdk.version=" . Client::API_VERSION,
            "sdk.lang=php_" . SystemInformationProvider::getPhpVersion(),
            "os=" . SystemInformationProvider::getOsDescription()
        ];

        return implode("/", $data);
    }
}