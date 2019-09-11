<?php

namespace SalesForce\MarketingCloud\Event;

use Symfony\Contracts\EventDispatcher\Event;

/**
 * Class AuthSuccessEvent
 *
 * @package SalesForce\MarketingCloud\Event
 */
class AuthSuccessEvent extends Event
{
    public const NAME = "mcsdk.auth.success";

    /**
     * @var string
     */
    private $restInstanceUrl;

    /**
     * @var string
     */
    private $accessToken;

    /**
     * @return string
     */
    public function getRestInstanceUrl(): string
    {
        return $this->restInstanceUrl;
    }

    /**
     * @param string $restInstanceUrl
     * @return AuthSuccessEvent
     */
    public function setRestInstanceUrl(string $restInstanceUrl): AuthSuccessEvent
    {
        $this->restInstanceUrl = rtrim($restInstanceUrl, '/');

        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @param string $authToken
     * @return AuthSuccessEvent
     */
    public function setAccessToken(string $authToken): AuthSuccessEvent
    {
        $this->accessToken = $authToken;

        return $this;
    }
}