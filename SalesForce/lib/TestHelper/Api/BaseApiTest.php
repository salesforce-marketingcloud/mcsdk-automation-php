<?php

namespace SalesForce\MarketingCloud\TestHelper\Api;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use SalesForce\MarketingCloud\Api\AbstractApi;
use SalesForce\MarketingCloud\Api\Client as ApiFactory;
use SalesForce\MarketingCloud\ApiException;
use SalesForce\MarketingCloud\Model\ModelInterface;
use SalesForce\MarketingCloud\TestHelper\Decorator\NullDecorator;
use SalesForce\MarketingCloud\TestHelper\Model\Provisioner\AbstractModelProvisioner;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\AbstractModelProvider;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Base class for the unit tests
 *
 * @package SalesForce\MarketingCloud\TestHelper\Api
 */
abstract class BaseApiTest extends TestCase
{
    /**
     * @var ContainerBuilder
     */
    protected static $container;

    /**
     * @var ApiFactory
     */
    protected static $apiFactory;

    /**
     * The client class to use in order to build the client object
     *
     * @var string
     */
    protected $clientClass;

    /**
     * @var AbstractApi
     */
    private $client;

    /**
     * @var ResourceCreator
     */
    private $resourceCreator;

    /**
     * @var object
     */
    private $decorator;

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
    protected static $modelNamespace;

    /**
     * @var ModelInterface
     */
    private $resource;

    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        static::setupContainer();
    }

    /**
     * Sets up the container
     *
     * @return void
     * @throws \Exception
     */
    private static function setupContainer(): void
    {
        // HTTP client config
        $clientConfig = ['verify' => false];
        if ((int) getenv("FIDDLER_ENABLE") == 1) {
            $clientConfig["proxy"] = '127.0.0.1:8888';
        }

        // Setup the dependency container
        static::$container = new ContainerBuilder();
        static::$apiFactory = new ApiFactory(static::$container, new Client($clientConfig));

        static::preloadClients();
    }

    /**
     * Pre-loads the clients to they are available in all the tests
     *
     * @throws \Exception
     */
    private static function preloadClients(): void
    {
        static::$apiFactory->getAssetApi();
        static::$apiFactory->getCampaignApi();
        static::$apiFactory->getTransactionalMessagingApi();
    }

    /**
     * @inheritDoc
     * @throws \Exception
     */
    public function tearDown(): void
    {
        // For manual written cases
        if (null === $this->resourceCreator) {
            return;
        }

        if ($this->httpMethod !== "DELETE") {
            call_user_func([$this->getClient(), $this->modelProvider::getApiDeleteMethod()], $this->getResourceId());
        }

        $this->provisioner->deplete($this->resource);

        // Object reset
        $this->resource = null;
        $this->modelProvider = null;
        $this->provisioner = null;
    }

    /**
     * Creates the client required to do the API calls
     *
     * @return AbstractApi
     * @throws \Exception
     */
    protected function getClient(): AbstractApi
    {
        if (null === $this->client) {
            $this->client = static::$apiFactory->getClient($this->clientClass);
        }

        return $this->client;
    }

    /**
     * Returns a resource creator instance
     *
     * @return ResourceCreator
     * @throws \Exception
     */
    protected function getResourceCreator(): ResourceCreator
    {
        if (null === $this->resourceCreator) {
            $this->resourceCreator = new ResourceCreator();
            $this->resourceCreator->setContainer(static::$container);
            $this->resourceCreator->setClient($this->getClient());
            $this->resourceCreator->setModelNamespace(static::$modelNamespace);
        }

        return $this->resourceCreator;
    }

    /**
     * Lazy-loader for the tests decorator
     *
     * @return object
     */
    protected function getDecorator(): object
    {
        if (null === $this->decorator) {
            // Create the decorator class name
            $clientNamespace = explode("\\", $this->clientClass);
            $decoratorClass = implode("\\", [
                "\\" . $clientNamespace[0],
                $clientNamespace[1],
                "TestHelper",
                "Decorator",
                $clientNamespace[3] . "Decorator"
            ]);

            // Create the decorator object
            if (class_exists($decoratorClass)) {
                $this->decorator = new $decoratorClass();
            } else {
                $this->decorator = new NullDecorator();
            }

            // Set dependencies
            if ($this->decorator instanceof ContainerAwareInterface) {
                $this->decorator->setContainer(static::$container);
            }
        }

        return $this->decorator;
    }


    /**
     * Sets the HTTP method of the test
     *
     * @param string $httpMethod
     */
    public function setHttpMethod(string $httpMethod): void
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * Selects the appropriate action method
     *
     * @param string $operation
     * @return void
     */
    protected function executeOperation(string $operation): void
    {
        $methodMap = [
            "GET" => "doGetAction",
            "POST" => "doCreateAction",
            "PATCH" => "doPatchAction",
            "DELETE" => "doDeleteAction",
        ];

        if (!isset($methodMap[$this->httpMethod])) {
            throw new \InvalidArgumentException("The {$this->httpMethod} action is not supported");
        }

        call_user_func([$this, $methodMap[$this->httpMethod]], $operation);
    }

    /**
     * Returns the resource identification info
     *
     * @return mixed
     */
    protected function getResourceId()
    {
        return call_user_func([$this->resource, $this->modelProvider::getModelIdMethod()]);
    }

    /**
     * Creates the resource on the API
     *
     * @return void
     * @throws \Exception
     */
    protected function createResourceOnEndpoint(): void
    {
        $resourceCreator = $this->getResourceCreator();

        $this->resource = $resourceCreator->create();
        $this->modelProvider = $resourceCreator->getModelProvider();
        $this->provisioner = $resourceCreator->getProvisioner();
    }

    /**
     * Performs the create action for the test
     *
     * @param string $clientMethod
     */
    protected function doCreateAction(string $clientMethod): void
    {
        unset($clientMethod); // Avoids IDE errors

        $this->assertNotEmpty($this->getResourceId());
    }

    /**
     * Performs the retrieve action for the test
     *
     * @param string $clientMethod
     * @throws \Exception
     */
    protected function doGetAction(string $clientMethod): void
    {
        /** @var ModelInterface $resource */
        $resource = call_user_func([$this->getClient(), $clientMethod], $this->getResourceId());

        $this->assertInstanceOf($this->getResourceCreator()->getModelClass(), $resource);
    }

    /**
     * Performs the PATCH action for the test
     *
     * @param string $clientMethod
     * @throws \Exception
     */
    protected function doPatchAction(string $clientMethod): void
    {
        $updatedResource = call_user_func(
            [$this->getClient(), $clientMethod],
            $this->getResourceId(),
            $this->modelProvider::getPatchedModel($this->resource)
        );

        $this->assertNotEquals($this->resource, $updatedResource);
    }

    /**
     * Performs the delete action for the test
     *
     * @param string $clientMethod
     * @throws \Exception
     */
    protected function doDeleteAction(string $clientMethod): void
    {
        $this->expectException(ApiException::class);
        $this->expectExceptionCode(404);

        $client = $this->getClient();
        $resourceId = $this->getResourceId();

        call_user_func([$client, $clientMethod], $this->getResourceId()); // DELETE
        call_user_func([$client, $this->modelProvider::getApiGetMethod()], $resourceId); // FETCH to check
    }
}