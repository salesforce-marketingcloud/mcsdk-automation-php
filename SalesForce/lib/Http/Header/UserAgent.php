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
            "MCSDK",
            "PHP",
            Client::API_VERSION,
            SystemInformationProvider::getPhpVersion(),
            SystemInformationProvider::getOsDescription()
        ];

        return implode("/", $data);
    }
}
