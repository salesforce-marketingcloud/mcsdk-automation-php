<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Api\AssetApi;
use SalesForce\MarketingCloud\Api\TransactionalMessagingApi;
use SalesForce\MarketingCloud\Model\Asset;
use SalesForce\MarketingCloud\Model\AssetType;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionContent;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\AssetProvider;

/**
 * Class EmailDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class EmailDefinition extends AbstractModelProvisioner
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
     * @param ModelInterface|CreateEmailDefinitionRequest $model
     * @return ModelInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        // Input check
        if (!$model instanceof CreateEmailDefinitionRequest) {
            throw new \InvalidArgumentException(
                "Parameter 0 is not of type " . CreateEmailDefinitionRequest::class
            );
        }

        $this->asset = $this->createAsset();
        $model->setContent(new CreateEmailDefinitionContent(["customerKey" => $this->asset->getCustomerKey()]));

        return $model;
    }

    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|CreateEmailDefinitionRequest $model
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