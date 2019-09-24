<?php

namespace SalesForce\MarketingCloud\Test\Authorization;

use League\OAuth2\Client\Grant\GrantFactory;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Cache\InvalidArgumentException;
use SalesForce\MarketingCloud\Api\Client\ConfigBuilder;
use SalesForce\MarketingCloud\Authorization\AuthService;
use SalesForce\MarketingCloud\Authorization\AuthServiceBuilder;
use SalesForce\MarketingCloud\Authorization\Client\GenericClient;
use SalesForce\MarketingCloud\Authorization\Client\Tool\RequestFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class AuthServiceTest
 *
 * @package SalesForce\MarketingCloud
 */
class AuthServiceTest extends TestCase
{
    /**
     * @throws \Exception
     */
    public function testCreateAuthService()
    {
        $container = new ContainerBuilder();
        $configBuilder = new ConfigBuilder($container);
        $configBuilder->setFromEnv();

        $this->assertInstanceOf(
            AuthService::class,
            AuthServiceBuilder::execute($container)
        );
    }

    /**
     * Returns test data
     *
     * @return array
     */
    public function authCacheStatesDataProvider(): array
    {
        // Params are: $expires_in, $callCount, $sleep
        return [
            [60, 1, 0], // 60s cache, getAccessToken() method should be called 1 time
            [33, 2, 3]   // 30s cache, getAccessToken() method should be called 2 times
        ];
    }

    /**
     * @dataProvider authCacheStatesDataProvider
     * @param int $expires_in Time in seconds that the AccessToken is valid
     * @param int $callCount How many times the getAccessToken() method should be called
     * @param int $sleep Sleep time in seconds
     * @throws \Exception
     */
    public function testAuthorizeWithDummyAuthClient(int $expires_in, int $callCount, int $sleep = 3)
    {
        /** @var GenericClient|MockObject $clientMock */
        $clientMock = $this->getMockBuilder(GenericClient::class)
            ->disableOriginalConstructor()
            ->onlyMethods(['getAccessTokenResponse'])
            ->getMock();

        $clientMock->setGrantFactory(new GrantFactory());
        $clientMock->setRequestFactory(new RequestFactory());

        $clientMock->expects($this->exactly($callCount))
            ->method("getAccessTokenResponse")
            ->willReturnCallback(function () use ($expires_in) {
                return [
                    "access_token" => "test",
                    "expires_in" => $expires_in,
                    "rest_instance_url" => "https://www.example.com/"
                ];
            });

        $container = new ContainerBuilder();
        $container->set("auth.client", $clientMock);

        $configBuilder = new ConfigBuilder($container);
        $configBuilder->setFromEnv();
        $configBuilder->setClientId("access_tok");
        $configBuilder->setAccountId("en_test");

        // SUT
        $service = AuthServiceBuilder::execute($container);

        try {
            $service->authorize();
            sleep($sleep);
            $token = $service->authorize();

            $this->assertEquals("test", $token->getToken());
        } catch (IdentityProviderException $e) {
            $this->fail("Authorization failed");
        } catch (InvalidArgumentException $e) {
            $this->fail("Authorization failed");
        }
    }
}