<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest;
use SalesForce\MarketingCloud\Model\CreateSmsDefinitionContent;
use SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest;
use SalesForce\MarketingCloud\Model\CreateSmsDefinitionSubscriptions;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\Model\UpdateSmsDefinitionRequest;

/**
 * Class SmsDefinitionProvider
 *
 * @package TestHelper\Model\Provider
 */
class SmsDefinitionProvider extends AbstractModelProvider
{
    /**
     * Creates a test object
     *
     * @return ModelInterface|null
     */
    public static function getTestModel(): ?ModelInterface
    {
        $content = new CreateSmsDefinitionContent(["message" => "Content message"]);
        $subscriptions = new CreateSmsDefinitionSubscriptions([
            "shortCode" => getenv("SHORT_CODE"),
            "keyword" => getenv("KEYWORD"),
            "countryCode" => "US"
        ]);


        $object = new CreateSmsDefinitionRequest([
            "definitionKey" => md5((string)rand(0, 9999)),
            "definitionName" =>  md5((string)rand(0, 9999)),
            "content" => $content,
            "subscriptions" => $subscriptions,
            "name" => md5(rand(0, 9999))
        ]);

        return $object;
    }

    /**
     * Updates some field of the test object
     *
     * @param ModelInterface|CreateSmsDefinitionRequest $object
     * @return ModelInterface
     */
    public static function getPatchedModel(ModelInterface $object): ModelInterface
    {
        return new UpdateSmsDefinitionRequest([
            "name" => $object->getName(),
            "content" => new CreateSmsDefinitionContent(["message" => "New Content message"])
        ]);
    }

    /**
     * @inheritDoc
     */
    public static function getApiCreateMethod(): string
    {
        return "createSmsDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getApiGetMethod(): string
    {
        return "getSmsDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getApiDeleteMethod(): string
    {
        return "deleteSmsDefinition";
    }

    /**
     * @inheritDoc
     */
    public static function getModelIdMethod(): string
    {
        return "getDefinitionKey";
    }
}