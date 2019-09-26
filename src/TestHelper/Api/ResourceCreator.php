<?php

namespace SalesForce\MarketingCloud\TestHelper\Api;

use SalesForce\MarketingCloud\Api\AbstractApi;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\AbstractModelProvider;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\ModelProviderResolver;
use SalesForce\MarketingCloud\TestHelper\Model\Provisioner\AbstractModelProvisioner;
use SalesForce\MarketingCloud\TestHelper\Model\Provisioner\ProvisionerResolver;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class ResourceCreator
 *
 * @package SalesForce\MarketingCloud\TestHelper\Api
 */
class ResourceCreator implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var AbstractApi
     */
    private $client;

    /**
     * @var AbstractModelProvisioner
     */
    private $provisioner;

    /**
     * @var AbstractModelProvider|string
     */
    private $modelProvider;

    /**
     * @var string
     */
    protected $modelNamespace;

    /**
     * @var ModelInterface|string
     */
    private $modelClass;

    /**
     * @var string
     */
    private $apiMethod;

    /**
     * Sets the service container
     *
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Sets the client object
     *
     * @param AbstractApi $client
     */
    public function setClient(AbstractApi $client): void
    {
        $this->client = $client;
    }

    /**
     * @param string $modelNamespace
     */
    public function setModelNamespace(string $modelNamespace): void
    {
        $this->modelNamespace = $modelNamespace;
    }

    /**
     * Sets the class of the model in the SUT
     *
     * @param string $invokerMethod
     * @param string|null $modelClass
     */
    public function setModelClass(string $invokerMethod, ?string $modelClass): void
    {
        $this->apiMethod = lcfirst(ltrim($invokerMethod, "test"));

        if (empty($modelClass)) {
            $modelClass = $this->guessModelClass($this->apiMethod);
        }

        $this->modelClass = $modelClass;
    }

    /**
     * Retrieve the model class
     *
     * @return ModelInterface|string
     */
    public function getModelClass(): string
    {
        return $this->modelClass;
    }

    /**
     * Returns the detected model provider for the last creation
     *
     * @return AbstractModelProvider|string
     */
    public function getModelProvider(): string
    {
        return $this->modelProvider;
    }

    /**
     * Returns the detected model provisioner for the last creation
     *
     * @return AbstractModelProvisioner
     */
    public function getProvisioner(): AbstractModelProvisioner
    {
        return $this->provisioner;
    }

    /**
     * Tries to guess the model class
     *
     * @param string $clientMethod
     * @return string
     */
    protected function guessModelClass(string $clientMethod): string
    {
        // Strip the prefix
        $clientMethod = ltrim($clientMethod, "get");
        $clientMethod = ltrim($clientMethod, "create");
        $clientMethod = ltrim($clientMethod, "partiallyUpdate");
        $clientMethod = ltrim($clientMethod, "delete");

        // Strip the suffix
        $clientMethod = rtrim($clientMethod, "ById");

        return strval($this->modelNamespace) . "\\" . ucfirst($clientMethod);
    }

    /**
     * Creates a resource on the API
     *
     * @return ModelInterface
     */
    public function create(): ModelInterface
    {
        // Creating the provisioner
        $provisionerClass = ProvisionerResolver::resolve($this->modelClass, $this->apiMethod);
        $this->provisioner = new $provisionerClass();
        if ($this->provisioner instanceof ContainerAwareInterface) {
            $this->provisioner->setContainer($this->container);
        }

        // Store this for later use
        $this->modelProvider = ModelProviderResolver::resolve($this->modelClass, $this->apiMethod);

        // Setup
        $clientMethod = $this->modelProvider::getApiCreateMethod();
        $model = $this->provisioner->provision($this->modelProvider::getTestModel());

        return call_user_func([$this->client, $clientMethod], $model);
    }
}