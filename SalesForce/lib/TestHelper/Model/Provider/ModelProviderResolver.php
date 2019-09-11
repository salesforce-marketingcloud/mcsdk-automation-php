<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provider;

use SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest;
use SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest;
use SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse;
use SalesForce\MarketingCloud\Model\DeleteSendDefinitionResponse;
use SalesForce\MarketingCloud\Model\GetEmailDefinitionsResponse;
use SalesForce\MarketingCloud\Model\GetQueueMetricsForSendDefinitionResponse;
use SalesForce\MarketingCloud\Model\GetSmsDefinitionsResponse;

/**
 * Class ModelProviderResolver
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provider
 */
class ModelProviderResolver
{
    /**
     * Aliased classes to avoid creating a lot of provider classes
     *
     * @var array
     */
    private static $aliases = [
        "email" => [
            // Email definition
            CreateEmailDefinitionRequest::class => EmailDefinitionProvider::class,
            GetEmailDefinitionsResponse::class => EmailDefinitionProvider::class,
            GetQueueMetricsForSendDefinitionResponse::class => EmailDefinitionProvider::class,
            DeleteSendDefinitionResponse::class => EmailDefinitionProvider::class,
            DeleteQueuedMessagesForSendDefinitionResponse::class => EmailDefinitionProvider::class,
        ],
        "sms" => [
            // SMS definition
            CreateSmsDefinitionRequest::class => SmsDefinitionProvider::class,
            GetSmsDefinitionsResponse::class => SmsDefinitionProvider::class,
            GetQueueMetricsForSendDefinitionResponse::class => SmsDefinitionProvider::class,
            DeleteSendDefinitionResponse::class => SmsDefinitionProvider::class,
            DeleteQueuedMessagesForSendDefinitionResponse::class => SmsDefinitionProvider::class,
        ],
        "other" => []
    ];

    /**
     * Cache of model class to provider
     *
     * @var array
     */
    private static $cache = [];

    /**
     * Returns the corresponding alias list based on the API method that is being tested
     *
     * @param string $apiMethod
     * @return string
     */
    private static function getAliasList(string $apiMethod)
    {
        $matches = [];
        if (preg_match("/(sms|email)/i", $apiMethod, $matches)) {
            return static::$aliases[strtolower($matches[0])];
        }

        return static::$aliases["other"];
    }

    /**
     * Resolve a model name to a provider
     *
     * @param string $modelClass
     * @param string $apiMethod
     * @return string|AbstractModelProvider
     */
    public static function resolve(string $modelClass, string $apiMethod): string
    {
        $modelClass = ltrim($modelClass, "\\"); // Fix naming

        // Check for aliases and return directly...no need to put in cache and do the extra processing
        $aliases = static::getAliasList($apiMethod);
        if (isset($aliases[$modelClass])) {
            return $aliases[$modelClass];
        }

        // Resolve the model class
        if (!isset(static::$cache[$modelClass])) {
            $matches = [];
            $className = "";

            if (preg_match('/(.*)\\\(Create|Send|Update|Delete)(.*)/', $modelClass, $matches)) {
                $className = $matches[3] . "Provider";
            } else {
                if (preg_match('/(.*)\\\(.*)/', $modelClass, $matches)) {
                    $className = $matches[2] . "Provider";
                }
            }

            if (class_exists(__NAMESPACE__ . '\\' . $className)) {
                static::$cache[$modelClass] = __NAMESPACE__ . '\\' . $className;
            } else {
                throw new \InvalidArgumentException("Could not find provider class for {$modelClass}");
            }
        }

        return static::$cache[$modelClass];
    }
}