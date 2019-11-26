<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\Campaign;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\Model\Recipient;

/**
 * Trait RecipientProvider
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provider
 */
class RecipientProvider extends AbstractModelProvider
{
    /**
     * Creates a test object
     *
     * @return ModelInterface|Recipient|null
     */
    public static function getTestModel(): ?ModelInterface
    {
        $object = new Recipient([
            "contactKey" => "johnDoe@gmail.com",
            "messageKey" => static::generateUniqueId()
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
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @inheritDoc
     */
    public static function getApiCreateMethod(): string
    {
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @inheritDoc
     */
    public static function getApiGetMethod(): string
    {
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @inheritDoc
     */
    public static function getApiDeleteMethod(): string
    {
        throw new \RuntimeException('Method not implemented');
    }

    /**
     * @inheritDoc
     */
    public static function getModelIdMethod(): string
    {
        throw new \RuntimeException('Method not implemented');
    }
}