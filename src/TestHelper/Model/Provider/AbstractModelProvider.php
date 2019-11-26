<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class AbstractModelProvider
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provider
 */
abstract class AbstractModelProvider
{
    protected static $uniqueIdCache = [];

    /**
     * Creates a test object
     *
     * @return ModelInterface|null
     */
    public static abstract function getTestModel(): ?ModelInterface;

    /**
     * Updates some field of the test object
     *
     * @param ModelInterface $object
     * @return ModelInterface|null
     */
    public static abstract function getPatchedModel(ModelInterface $object): ?ModelInterface;

    /**
     * Returns the method that can be used call the API and create a resource based on the test object
     *
     * @return string
     */
    public static function getApiCreateMethod(): string
    {
        throw new \RuntimeException(__METHOD__ . " is not implemented");
    }

    /**
     * Returns the method that can be used call the API and create a resource based on the test object
     *
     * @return string
     */
    public static function getApiGetMethod(): string
    {
        throw new \RuntimeException(__METHOD__ . " is not implemented");
    }

    /**
     * Returns the method that can be used call the API and create a resource based on the test object
     *
     * @return string
     */
    public static function getApiDeleteMethod(): string
    {
        throw new \RuntimeException(__METHOD__ . " is not implemented");
    }

    /**
     * Returns the method that can be used call identify a resource
     *
     * @return string
     */
    public static function getModelIdMethod(): string
    {
        throw new \RuntimeException(__METHOD__ . " is not implemented");
    }

    /**
     * Generates a unique identifier
     *
     * @return string
     */
    protected static function generateUniqueId(): string
    {
        do {
            $pieces = [];
            for ($i = 0; $i < 3; $i++) {
                $pieces[] = str_pad((string)rand(0, 9999), 4, '0');
            }

            $id = uniqid(implode('-', $pieces));
        } while (in_array($id, static::$uniqueIdCache));

        return $id;
    }
}