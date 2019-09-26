<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\Campaign;
use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Trait CampaignProvider
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provider
 */
class CampaignProvider extends AbstractModelProvider
{
    /**
     * Creates a test object
     *
     * @return ModelInterface|null
     */
    public static function getTestModel(): ?ModelInterface
    {
        $object = new Campaign([
            "name" => "Random name",
            "description" => "Random description",
            "campaignCode" => "100",
            "color" => "red",
            "favorite" => 0
        ]);

        return $object;
    }

    /**
     * Updates some field of the test object
     *
     * @param ModelInterface|Campaign $object
     * @return ModelInterface
     */
    public static function getPatchedModel(ModelInterface $object): ModelInterface
    {
        $patched = clone $object;
        $patched->setName("Some random name");

        return $patched;
    }

    /**
     * @inheritDoc
     */
    public static function getApiCreateMethod(): string
    {
        return "createCampaign";
    }

    /**
     * @inheritDoc
     */
    public static function getApiGetMethod(): string
    {
        return "getCampaignById";
    }

    /**
     * @inheritDoc
     */
    public static function getApiDeleteMethod(): string
    {
        return "deleteCampaignById";
    }

    /**
     * @inheritDoc
     */
    public static function getModelIdMethod(): string
    {
        return "getId";
    }
}