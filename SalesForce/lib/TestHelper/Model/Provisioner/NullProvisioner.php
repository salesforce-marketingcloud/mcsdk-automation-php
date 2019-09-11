<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class NullProvisioner
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class NullProvisioner extends AbstractModelProvisioner
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