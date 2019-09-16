<?php

namespace SalesForce\MarketingCloud\Api;

use GuzzleHttp\Client as HttpClient;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use SalesForce\MarketingCloud\Configuration;
use SalesForce\MarketingCloud\Api\Client\ConfigBuilder;
use SalesForce\MarketingCloud\Authorization\AuthServiceBuilder;
use SalesForce\MarketingCloud\Event\Subscriber\AuthEventSub;

/**
 * Class Client
 *
 * NOTE: This class is auto generated
 *
 * @package SalesForce\MarketingCloud\Api
 * @method self setAccountId(string $accountId)
 * @method self setClientId(string $clientId)
 * @method self setClientSecret(string $clientSecret)
 * @method self setUrlAuthorize(string $urlAuthorize)
 * @method self setUrlAccessToken(string $urlAccessToken)
 * @method self setUrlResourceOwnerDetails(string $urlResourceOwnerDetails)
 */
class Client
{
    const API_VERSION = "1.0.0";

    # List of available clients
    const CLIENT_ASSET_API = \SalesForce\MarketingCloud\Api\AssetApi::class;
    const CLIENT_CAMPAIGN_API = \SalesForce\MarketingCloud\Api\CampaignApi::class;
    const CLIENT_TRANSACTIONAL_MESSAGING_API = \SalesForce\MarketingCloud\Api\TransactionalMessagingApi::class;

    /**
     * Stores the container builder required to create the APIs
     *
     * @var ContainerBuilder
     */
    private $container;

    /**
     * @var ConfigBuilder
     */
    private $config;

    /**
     * Client constructor.
     *
     * @param ContainerBuilder|null $container
     * @param HttpClient|null $httpClient
     * @param bool $cfgFromEnv
     */
    public function __construct(
        ContainerBuilder $container = null,
        HttpClient $httpClient = null,
        bool $cfgFromEnv = true
    ) {
        $this->container = $container ?? new ContainerBuilder();
        $this->config = new ConfigBuilder($this->container);

        // Set the provided HTTP client
        $this->container->set("auth.http.client", $httpClient ?? new HttpClient());

        // Setting configurations
        if ($cfgFromEnv) {
            $this->config->setFromEnv();
        }
    }

    /**
     * Returns the configuration builder
     *
     * @return ConfigBuilder
     */
    public function getConfig(): ConfigBuilder
    {
        return $this->config;
    }

    /**
     * Creates/retrieves the requested client object
     *
     * @param string $class
     * @return AbstractApi|AssetApi|CampaignApi|TransactionalMessagingApi
     * @throws \Exception
     */
    public function getClient(string $class): \SalesForce\MarketingCloud\Api\AbstractApi
    {
        if (!$this->container->has($class)) {
            $configuration = new Configuration();

            // Creating the AUTH service
            $authService = AuthServiceBuilder::execute($this->container);

            // Event handling
            $eventDispatcher = $authService->getEventDispatcher();
            $eventDispatcher->addSubscriber(new AuthEventSub($configuration));

            // Registering the API client service
            $this->container->set($class, new $class(
                $authService,
                $this->container->get("auth.http.client"),
                $configuration
            ));
        }

        /** @var \SalesForce\MarketingCloud\Api\AbstractApi $client */
        $client = $this->container->get($class);

        return $client;
    }
    
    /**
     * Creates a new AssetApi object
     *
     * @return AssetApi
     * @throws \Exception
     */
    public function getAssetApi(): \SalesForce\MarketingCloud\Api\AssetApi
    {
        return $this->getClient(self::CLIENT_ASSET_API);
    }
    
    /**
     * Creates a new CampaignApi object
     *
     * @return CampaignApi
     * @throws \Exception
     */
    public function getCampaignApi(): \SalesForce\MarketingCloud\Api\CampaignApi
    {
        return $this->getClient(self::CLIENT_CAMPAIGN_API);
    }
    
    /**
     * Creates a new TransactionalMessagingApi object
     *
     * @return TransactionalMessagingApi
     * @throws \Exception
     */
    public function getTransactionalMessagingApi(): \SalesForce\MarketingCloud\Api\TransactionalMessagingApi
    {
        return $this->getClient(self::CLIENT_TRANSACTIONAL_MESSAGING_API);
    }
}
