<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Api\TransactionalMessagingApi;
use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class SmsDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class SmsDefinitionProvisioner extends AbstractModelProvisioner
{
    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        return $model;
    }

    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface $model
     * @return ModelInterface
     */
    public function deplete(ModelInterface $model): ModelInterface
    {
        return $model;
    }
}