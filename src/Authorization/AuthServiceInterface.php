<?php

namespace SalesForce\MarketingCloud\Authorization;

use League\OAuth2\Client\Token\AccessTokenInterface;
use Psr\Cache\CacheItemPoolInterface;
use SalesForce\MarketingCloud\Authorization\Client\GenericClient;

/**
 * Class AuthService
 *
 * @package SalesForce\MarketingCloud\Authorization
 */
interface AuthServiceInterface
{
    /**
     * Sets the cache
     *
     * @param CacheItemPoolInterface $cache
     * @return mixed
     */
    public function setCache(CacheItemPoolInterface $cache): void;

    /**
     * Sets the client used for the authorization
     *
     * @param GenericClient $client
     */
    public function setClient(GenericClient $client): void;

    /**
     * Set the type of grant type for the authorization server
     *
     * @param string $grantType
     */
    public function setGrantType(string $grantType): void;

    /**
     * Performs the authorization process
     *
     * @return AccessTokenInterface
     */
    public function authorize(): AccessTokenInterface;
}