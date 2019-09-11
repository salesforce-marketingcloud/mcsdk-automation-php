<?php

namespace SalesForce\MarketingCloud\Authorization;

use GuzzleHttp\Client as HttpClient;
use Psr\Cache\CacheItemPoolInterface;
use SalesForce\MarketingCloud\Authorization\Client\GenericClient as AuthClient;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AuthServiceFactory
 *
 * @package SalesForce\MarketingCloud\Authorization
 */
class AuthServiceBuilder
{
    /**
     * Setup the container to create the object
     *
     * @param ContainerBuilder $container
     * @return AuthService
     * @throws \Exception
     */
    public static function execute(ContainerBuilder $container): AuthService
    {
        // Cache
        $cache = $container->has("auth.cache") ? $container->get("auth.cache") : new ArrayAdapter();
        if (!$cache instanceof CacheItemPoolInterface) {
            throw new \InvalidArgumentException("The cache object does not implement the CacheItemPoolInterface");
        }

        // Client options
        $clientOptions = $container->getParameter("auth.client.options");
        array_walk($clientOptions, function ($value, $key) {
            if (in_array($key, ["clientId", "accountId"]) && empty($value)) {
                throw new \RuntimeException("Invalid value provided for option {$key}");
            }
        });

        // Authentication client
        if ($container->has("auth.client")) {
            $client = $container->get("auth.client");
            if (!$client instanceof AuthClient) {
                throw new \InvalidArgumentException("Invalid AUTH client provided for authentication");
            }
        } else {
            // HTTP client adapter
            $httpClient = $container->has("auth.http.client") ? $container->get("auth.http.client") : new HttpClient();
            if (!$httpClient instanceof HttpClient) {
                throw new \InvalidArgumentException("Invalid HTTP client provided for authentication");
            }

            $client = new AuthClient($clientOptions);
            $client->setHttpClient($httpClient);
        }

        // Creating the service
        $service = new AuthService();
        $service->setCache($cache);
        $service->setCacheKey($clientOptions["clientId"] . $clientOptions["accountId"]);
        $service->setClient($client);

        return $service;
    }
}