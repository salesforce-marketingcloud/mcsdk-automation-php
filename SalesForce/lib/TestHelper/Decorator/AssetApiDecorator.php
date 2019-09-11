<?php

namespace SalesForce\MarketingCloud\TestHelper\Decorator;

use SalesForce\MarketingCloud\Api\AssetApi;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CampaignApiDecorator
 *
 * @package SalesForce\MarketingCloud\TestHelper\Decorator
 */
class AssetApiDecorator implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Wrapper method to retrieve the client
     *
     * @return AssetApi
     */
    protected function getClient(): AssetApi
    {
        /** @var AssetApi $client */
        $client = $this->container->get(AssetApi::class);

        return $client;
    }
}