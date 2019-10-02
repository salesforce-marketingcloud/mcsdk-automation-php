<?php

namespace SalesForce\MarketingCloud\Authorization\Client;

use GuzzleHttp\Exception\BadResponseException;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessTokenInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SalesForce\MarketingCloud\Authorization\Client\Tool\RequestFactory;
use UnexpectedValueException;

/**
 * Class GenericClient
 *
 * @package SalesForce\MarketingCloud\Authorization\Client
 */
class GenericClient extends GenericProvider
{
    // List of configuration options
    const OPT_ACCOUNT_ID = 'accountId';
    const OPT_CLIENT_ID = 'clientId';
    const OPT_CLIENT_SECRET = 'clientSecret';
    const OPT_AUTH_URL = 'urlAuthorize';
    const OPT_ACCESS_TOKEN_URL = 'urlAccessToken';
    const OPT_RESOURCE_OWNER_DETAILS = 'urlResourceOwnerDetails';

    /**
     * GenericClient constructor.
     *
     * @param array $options
     * @param array $collaborators
     */
    public function __construct(array $options = [], array $collaborators = [])
    {
        // Default request factory
        if (empty($collaborators['requestFactory'])) {
            $collaborators['requestFactory'] = new RequestFactory();
        }

        // Request factory type check
        if (false === $collaborators['requestFactory'] instanceof RequestFactory) {
            throw new \InvalidArgumentException(
                "The request factory must be of type Authorization\Client\Tool\RequestFactory"
            );
        }

        parent::__construct($options, $collaborators);
    }

    /**
     * Requests an access token using a specified grant and option set.
     *
     * @param mixed $grant
     * @param array $options
     * @return array
     * @throws IdentityProviderException
     */
    public function getAccessTokenResponse($grant, array $options = []): array
    {
        $grant = $this->verifyGrant($grant);

        $params = $grant->prepareRequestParameters([
            'client_id' => $this->clientId,
            'client_secret' => $this->clientSecret,
            'redirect_uri' => $this->redirectUri,
        ], $options);

        $request = $this->getAccessTokenRequest($params);
        $response = $this->getParsedResponse($request);

        if (false === is_array($response)) {
            throw new UnexpectedValueException(
                'Invalid response received from Authorization Server. Expected JSON. Response: ' . $response
            );
        }

        return $response;
    }

    /**
     * Returns an access token using the provided response
     *
     * @param array $response
     * @param string $grant
     * @return AccessTokenInterface
     */
    public function getAccessTokenFromResponse(array $response, string $grant): AccessTokenInterface
    {
        $prepared = $this->prepareAccessTokenResponse($response);

        return $this->createAccessToken($prepared, $this->verifyGrant($grant));
    }
}