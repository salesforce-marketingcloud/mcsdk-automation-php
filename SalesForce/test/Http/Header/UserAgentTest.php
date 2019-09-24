<?php

namespace SalesForce\MarketingCloud\Test\Http\Header;

use PHPUnit\Framework\TestCase;
use SalesForce\MarketingCloud\Http\Header\UserAgent;

/**
 * Class UserAgentTest
 *
 * @package SalesForce\MarketingCloud\Test\Http\Header
 */
class UserAgentTest extends TestCase
{
    public function testGetUserAgentFromSystemInfo()
    {
        $this->assertNotEmpty(UserAgent::fromSysInfo());
    }
}