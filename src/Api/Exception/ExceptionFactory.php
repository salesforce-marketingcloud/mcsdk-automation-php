<?php

namespace SalesForce\MarketingCloud\Api\Exception;

use GuzzleHttp\Exception\RequestException;
use SalesForce\MarketingCloud\ApiException;

/**
 * Class ExceptionFactory
 *
 * @package SalesForce\MarketingCloud\Api\Exception
 */
final class ExceptionFactory
{
    public static function create(RequestException $e): ApiException
    {
        $request = $e->getRequest();
        $response = $e->getResponse();

        // List of supported exceptions
        $exceptions = [
            400 => BadRequestException::class,
            401 => AuthenticationFailureException::class,
            403 => UnauthorizedAccessException::class,
            404 => ResourceNotFoundException::class,
            500 => InternalServerErrorException::class,
            502 => BadGatewayException::class,
            503 => ServiceUnavailableException::class,
            504 => GatewayTimeoutException::class,
        ];

        // Getting the class name
        $className = ApiException::class;
        if (isset($exceptions[$e->getCode()])) {
            $className = $exceptions[$e->getCode()];
        }

        // Creating the exception
        return new $className("[{$e->getCode()}] [{$request->getUri()}] {$e->getMessage()}",
            $e->getCode(),
            $response ?? $response->getHeaders(),
            $response ?? $response->getBody()->getContents()
        );
    }
}