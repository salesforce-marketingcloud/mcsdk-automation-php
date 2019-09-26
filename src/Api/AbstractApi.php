<?php

namespace SalesForce\MarketingCloud\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use SalesForce\MarketingCloud\Api\Exception\ClientUnauthorizedException;
use SalesForce\MarketingCloud\Authorization\AuthService;
use SalesForce\MarketingCloud\Authorization\AuthServiceInterface;
use SalesForce\MarketingCloud\Configuration;
use SalesForce\MarketingCloud\HeaderSelector;
use SalesForce\MarketingCloud\Http\Header\UserAgent;

/**
 * Class AbstractApi
 *
 * @package SalesForce\MarketingCloud\Api
 */
abstract class AbstractApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var AuthServiceInterface
     */
    private $authService;

    /**
     * @param AuthService $authService
     * @param ClientInterface $client
     * @param Configuration $config
     * @param HeaderSelector $selector
     */
    public function __construct(
        AuthService $authService,
        ClientInterface $client = null,
        Configuration $config = null,
        HeaderSelector $selector = null
    ) {
        // Setting the properties
        $this->authService = $authService;
        $this->client = $client ?: new Client();
        $this->config = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();

    }

    /**
     * Lazy load the authorization
     *
     * @return AuthServiceInterface
     */
    protected function getAuthService(): AuthServiceInterface
    {
        return $this->authService;
    }

    /**
     * Create http client option
     *
     * @return array of http client options
     * @throws \RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: ' . $this->config->getDebugFile());
            }
        }

        return $options;
    }

    /**
     * Authorize the client and retrieves a valid access token
     *
     * @throws ClientUnauthorizedException
     */
    protected function authorizeClient(): void
    {
        $token = $this->getAuthService()->authorize();

        if (empty($token)) {
            throw new ClientUnauthorizedException();
        }
    }

    /**
     * Returns the User-Agent string
     *
     * @return string
     */
    final protected static function getUserAgent(): string
    {
        return UserAgent::fromSysInfo();
    }
}