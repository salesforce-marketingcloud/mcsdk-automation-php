<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Env;
use SalesForce\MarketingCloud\Model\SmsDefinitionContent;
use SalesForce\MarketingCloud\Model\SmsDefinition;
use SalesForce\MarketingCloud\Model\SmsDefinitionSubscriptions;
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
        $content = new SmsDefinitionContent(["message" => "Content message"]);
        $subscriptions = new SmsDefinitionSubscriptions([
            "shortCode" => getenv(Env::SHORT_CODE),
            "keyword" => getenv(Env::KEYWORD),
            "countryCode" => getenv(Env::COUNTRY_CODE)
        ]);


        $object = new SmsDefinition([
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
     * @param ModelInterface|SmsDefinition $object
     * @return ModelInterface
     */
    public static function getPatchedModel(ModelInterface $object): ModelInterface
    {
        return new UpdateSmsDefinitionRequest([
            "name" => $object->getName(),
            "content" => new SmsDefinitionContent(["message" => "New Content message"])
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