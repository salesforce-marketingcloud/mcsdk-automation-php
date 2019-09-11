<?php

namespace SalesForce\MarketingCloud\Api\Exception;

use SalesForce\MarketingCloud\Model\ModelInterface;
use Throwable;

/**
 * Class InvalidRequestException
 *
 * @package SalesForce\MarketingCloud\Api\Exception
 */
class InvalidRequestException extends \InvalidArgumentException
{
    /**
     * @var ModelInterface
     */
    private $request;

    /**
     * InvalidRequestException constructor.
     *
     * @param ModelInterface $request
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct(ModelInterface $request, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->request = $request;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns the list of errors
     *
     * @return array
     */
    public function getErrors(): array
    {
        return $this->request->listInvalidProperties();
    }
}