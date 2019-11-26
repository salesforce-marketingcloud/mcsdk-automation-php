<?php

namespace SalesForce\MarketingCloud\TestHelper\Model\Provisioner;

use SalesForce\MarketingCloud\Model\EmailDefinition;
use SalesForce\MarketingCloud\Model\ModelInterface;

/**
 * Class QueuedMessagesForEmailDefinition
 *
 * @package SalesForce\MarketingCloud\TestHelper\Model\Provisioner
 */
class QueuedMessagesForEmailDefinition extends EmailDefinitionProvisioner
{
    /**
     * Executes all the necessary provisioning
     *
     * @param ModelInterface|EmailDefinition $model
     * @return ModelInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    public function provision(ModelInterface $model): ModelInterface
    {
        parent::provision($model);

        $model->setStatus("Inactive");

        return $model;
    }
}