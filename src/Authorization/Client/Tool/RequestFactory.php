<?php

namespace SalesForce\MarketingCloud\Authorization\Client\Tool;

use SalesForce\MarketingCloud\Http\Header\UserAgent;

/**
 * Class RequestFactory
 *
 * @package SalesForce\MarketingCloud\Authorization\Client\Tool
 */
class RequestFactory extends \League\OAuth2\Client\Tool\RequestFactory
{
    /**
     * @inheritDoc
     */
    public function getRequest($method, $uri, array $headers = [], $body = null, $version = '1.1')
    {
        $headers["User-Agent"] = UserAgent::fromSysInfo(); // Overwrite user-agent

        return parent::getRequest($method, $uri, $headers, $body, $version);
    }

}