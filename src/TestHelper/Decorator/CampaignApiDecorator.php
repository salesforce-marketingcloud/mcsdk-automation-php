<?php

namespace SalesForce\MarketingCloud\TestHelper\Decorator;

use PHPUnit\Framework\Assert;
use SalesForce\MarketingCloud\Api\CampaignApi;
use SalesForce\MarketingCloud\ApiException;
use SalesForce\MarketingCloud\Model\Campaign;
use SalesForce\MarketingCloud\TestHelper\Api\ResourceCreator;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class CampaignApiDecorator
 *
 * @package SalesForce\MarketingCloud\TestHelper\Decorator
 */
class CampaignApiDecorator implements ContainerAwareInterface
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
     * @return CampaignApi
     */
    protected function getClient(): CampaignApi
    {
        /** @var CampaignApi $client */
        $client = $this->container->get(CampaignApi::class);

        return $client;
    }

    /**
     * Test case for deleteCampaignById
     *
     * deleteCampaignById.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDeleteCampaignById()
    {
        $resourceCreator = new ResourceCreator();
        $resourceCreator->setContainer($this->container);
        $resourceCreator->setModelClass(__FUNCTION__, Campaign::class);
        $resourceCreator->setClient($this->getClient());

        /** @var Campaign $resource */
        $resource = $resourceCreator->create();

        /** @var CampaignApi $client */
        $client = $this->getClient();

        $client->deleteCampaignById($resource->getId());

        try {
            $client->getCampaignById($resource->getId());
        } catch (ApiException $e) {
            Assert::assertEquals(400, $e->getCode(), "Response code mismatch");
        }
    }
}