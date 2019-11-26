<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Model\SmsDefinition;
use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class QueuedMessagesForSmsDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class QueuedMessagesForSmsDefinition extends SmsDefinitionProvisioner
{
    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|SmsDefinition $model
     * @return ModelInterface
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        parent::provision($model);

        $model->setStatus("Inactive");

        return $model;
    }
}