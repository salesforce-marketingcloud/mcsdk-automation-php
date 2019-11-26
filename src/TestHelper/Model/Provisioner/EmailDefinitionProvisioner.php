<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Api\AssetApi;
use SalesForce\MarketingCloud\Api\TransactionalMessagingApi;
use SalesForce\MarketingCloud\Model\Asset;
use SalesForce\MarketingCloud\Model\AssetType;
use SalesForce\MarketingCloud\Model\EmailDefinition;
use SalesForce\MarketingCloud\Model\EmailDefinitionContent;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\AssetProvider;

/**
 * Class EmailDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class EmailDefinitionProvisioner extends AbstractModelProvisioner
{
    /**
     * @var Asset
     */
    private $asset;

    /**
     * Creates a new asset on the API
     *
     * @return Asset
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    private function createAsset(): Asset
    {
        /** @var AssetApi $client */
        $client = $this->container->get(AssetApi::class);

        /** @var Asset $asset */
        $asset = AssetProvider::getTestModel();
        $asset->setAssetType(new AssetType(["id" => 208, "name" => "htmlemail", "displayName" => "htmlemail"]));

        return $client->createAsset($asset);
    }

    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|EmailDefinition $model
     * @return ModelInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        // Input check
        if (!$model instanceof EmailDefinition) {
            throw new \InvalidArgumentException(
                "Parameter 0 is not of type " . EmailDefinition::class
            );
        }

        $this->asset = $this->createAsset();
        $model->setContent(new EmailDefinitionContent(["customerKey" => $this->asset->getCustomerKey()]));

        return $model;
    }

    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|EmailDefinition $model
     * @return ModelInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    public function deplete(ModelInterface $model): ModelInterface
    {
        /** @var AssetApi $client */
        $client = $this->container->get(AssetApi::class);

        $client->deleteAssetById($this->asset->getId());

        return $model;
    }
}