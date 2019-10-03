<?php

namespace SalesForce\MarketingCloud\Authorization;

use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Token\AccessTokenInterface;
use SalesForce\MarketingCloud\Api\Exception\ClientUnauthorizedException;
use SalesForce\MarketingCloud\Authorization\Client\GenericClient;
use SalesForce\MarketingCloud\Cache\CacheAwareInterface;
use Psr\Cache\CacheItemPoolInterface;
use SalesForce\MarketingCloud\Event\AuthSuccessEvent;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Class AuthService
 *
 * @package SalesForce\MarketingCloud\Authorization
 */
class AuthService implements CacheAwareInterface, AuthServiceInterface
{
    /**
     * @var CacheItemPoolInterface
     */
    private $cache;

    /**
     * @var string
     */
    private $cacheKey = 'access_token';

    /**
     * @var GenericClient
     */
    private $client;

    /**
     * @var string
     */
    private $grantType = 'client_credentials';

    /**
     * @var EventDispatcher
     */
    private $eventDispatcher;

    /**
     * Sets the cache
     *
     * @param CacheItemPoolInterface $cache
     */
    public function setCache(CacheItemPoolInterface $cache): void
    {
        $this->cache = $cache;
    }

    /**
     * Sets the cache key to be used when caching the accessToken
     *
     * @param string $cacheKey
     */
    public function setCacheKey(string $cacheKey): void
    {
        $this->cacheKey = $cacheKey;
    }

    /**
     * Sets the client used for the authorization
     *
     * @param GenericClient $client
     */
    public function setClient(GenericClient $client): void
    {
        $this->client = $client;
    }

    /**
     * @param string $grantType
     */
    public function setGrantType(string $grantType): void
    {
        $this->grantType = $grantType;
    }

    /**
     * @return EventDispatcher
     */
    public function getEventDispatcher(): EventDispatcher
    {
        if (null === $this->eventDispatcher) {
            $this->eventDispatcher = new EventDispatcher();
        }

        return $this->eventDispatcher;
    }

    /**
     * @param EventDispatcher $eventDispatcher
     */
    public function setEventDispatcher(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * Authorizes the client
     *
     * @return AccessTokenInterface
     * @throws IdentityProviderException
     * @throws \Psr\Cache\InvalidArgumentException
     * @throws IdentityProviderException
     * @throws \Exception
     */
    public function authorize(): AccessTokenInterface
    {
        // First we look into the cache
        $cacheItem = $this->cache->getItem($this->cacheKey);
        if (!$cacheItem->isHit()) {
            $response = $this->client->getAccessTokenResponse($this->grantType);
            $token = $this->client->getAccessTokenFromResponse($response, $this->grantType);

            if (empty($token)) {
                throw new ClientUnauthorizedException("Authentication failed");
            }

            // Set the expire time
            $dateTime = new \DateTime();
            $dateTime->setTimestamp($token->getExpires());
            $dateTime->modify("-30 seconds");

            // Configuring the cache item
            $cacheItem->set($response);
            $cacheItem->expiresAt($dateTime);

            // Saves the cache item
            $this->cache->save($cacheItem);
        } else {
            $response = $cacheItem->get();
            $token = $this->client->getAccessTokenFromResponse($response, $this->grantType);
        }

        // Dispatch the event
        $this->getEventDispatcher()->dispatch($this->createSuccessEvent($response, $token), AuthSuccessEvent::NAME);

        return $token;
    }

    /**
     * Creates the authorize success event
     *
     * @param array $response
     * @param string|null $accessToken
     * @return AuthSuccessEvent
     */
    private function createSuccessEvent(array $response, string $accessToken = null): AuthSuccessEvent
    {
        if (null === $accessToken) {
            $accessToken = $this->client->getAccessTokenFromResponse($response, $this->grantType);
        }

        $event = new AuthSuccessEvent();
        $event->setAccessToken($accessToken);
        $event->setRestInstanceUrl($response["rest_instance_url"]);

        return $event;
    }
}