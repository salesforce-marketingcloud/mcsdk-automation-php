<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionSubscriptions;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\Model\UpdateEmailDefinitionRequest;

/**
 * Class EmailDefinitionProvider
 *
 * @package TestHelper\Model\Provider
 */
class EmailDefinitionProvider extends AbstractModelProvider
{
    /**
     * Creates a test object
     *
     * @return ModelInterface|null
     */
    public static function getTestModel(): ?ModelInterface
    {
        $uniqueKey = (string)rand(0, 9999);
        $name = md5("Name {$uniqueKey}"); // Asset names within a category and asset type must be unique

        $object = new CreateEmailDefinitionRequest([
            "name" => $name,
            "description" => "Random description",
            "definitionKey" => md5($uniqueKey),
            "subscriptions" => new CreateEmailDefinitionSubscriptions(["list" => "All Subscribers"]),
        ]);

        return $object;
    }

    /**
     * Updates some field of the test object
     *
     * @param ModelInterface|CreateEmailDefinitionRequest $object
     * @return ModelInterface
     */
    public static function getPatchedModel(ModelInterface $object): ModelInterface
    {
        return new UpdateEmailDefinitionRequest([
            "name" => $object->getName(),
            "description" => "Updated description"
        ]);
    }

    /**
     * @inheritDoc
     */
    public static function getApiCreateMethod(): string
    {
        return "createEmailDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getApiGetMethod(): string
    {
        return "getEmailDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getApiDeleteMethod(): string
    {
        return "deleteEmailDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getModelIdMethod(): string
    {
        return "getDefinitionKey";
    }
}