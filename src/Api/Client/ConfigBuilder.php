<?php

namespace SalesForce\MarketingCloud\Api\Client;

use SalesForce\MarketingCloud\Env;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class ConfigBuilder
 *
 * @package SalesForce\MarketingCloud\Api\Client
 *
 * @method self setAccountId(string $accountId)
 * @method self setClientId(string $clientId)
 * @method self setClientSecret(string $clientSecret)
 * @method self setUrlAuthorize(string $urlAuthorize)
 * @method self setUrlAccessToken(string $urlAccessToken)
 * @method self setUrlResourceOwnerDetails(string $urlResourceOwnerDetails)
 */
class ConfigBuilder
{
    /**
     * Stores the container builder required to create the APIs
     *
     * @var ContainerBuilder
     */
    private $container;

    /**
     * ConfigBuilder constructor.
     *
     * @param ContainerBuilder $container
     * @param bool $useDefaults
     */
    public function __construct(ContainerBuilder $container = null, bool $useDefaults = false)
    {
        $this->container = $container ?? new ContainerBuilder();

        if ($useDefaults) {
            $this->setFromEnv();
        }
    }

    /**
     * Sets the configuration in the container using the default config location (ENV)
     *
     * @return $this
     */
    public function setFromEnv()
    {
        // Set default config
        if (!$this->container->hasParameter("auth.client.options")) {
            $this->container->setParameter("auth.client.options", [
                'accountId' => getenv(Env::ACCOUNT_ID),
                'clientId' => getenv(Env::CLIENT_ID),
                'clientSecret' => getenv(Env::CLIENT_SECRET),
                'urlAuthorize' => getenv(Env::URL_AUTHORIZE),
                'urlAccessToken' => getenv(Env::URL_ACCESS_TOKEN),
                'urlResourceOwnerDetails' => ''
            ]);
        }

        return $this;
    }

    /**
     * Used to set the config
     *
     * @param string $name
     * @param array $arguments
     * @return self
     */
    public function __call(string $name, array $arguments): self
    {
        // Get the options
        $options = $this->container->getParameter("auth.client.options");

        // Update the option only if it was set by default
        $optionName = lcfirst(ltrim($name, "set"));
        if (isset($options[$optionName])) {
            $options[$optionName] = trim(strval($arguments[0]));
        }

        // Update the options
        $this->container->setParameter("auth.client.options", $options);

        return $this;
    }
}