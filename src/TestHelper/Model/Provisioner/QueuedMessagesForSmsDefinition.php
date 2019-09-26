<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest;
use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class QueuedMessagesForSmsDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class QueuedMessagesForSmsDefinition extends SmsDefinition
{
    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|CreateSmsDefinitionRequest $model
     * @return ModelInterface
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        parent::provision($model);

        $model->setStatus("Inactive");

        return $model;
    }
}