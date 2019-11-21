<?php

namespace SalesForce\MarketingCloud\TestHelper\Decorator;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\ExpectationFailedException;
use SalesForce\MarketingCloud\Api\TransactionalMessagingApi;
use SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse;
use SalesForce\MarketingCloud\Model\Recipient;
use SalesForce\MarketingCloud\Model\SendEmailToMultipleRecipientsRequest;
use SalesForce\MarketingCloud\Model\SendEmailToSingleRecipientRequest;
use SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsRequest;
use SalesForce\MarketingCloud\Model\SendSmsToSingleRecipientRequest;
use SalesForce\MarketingCloud\TestHelper\Api\ResourceCreator;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\EmailDefinitionProvider;
use SalesForce\MarketingCloud\TestHelper\Model\Provider\SmsDefinitionProvider;
use SalesForce\MarketingCloud\TestHelper\Model\Provisioner\EmailDefinitionProvisioner;
use SalesForce\MarketingCloud\TestHelper\Model\Provisioner\SmsDefinitionProvisioner;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class TransactionalMessagingDecorator
 *
 * @package SalesForce\MarketingCloud\TestHelper\Decorator
 */
class TransactionalMessagingApiDecorator implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface|null
     */
    private $container;

    /**
     * Sets the container.
     *
     * @param ContainerInterface|null $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Wrapper method to retrieve the client
     *
     * @return TransactionalMessagingApi
     */
    protected function getClient(): TransactionalMessagingApi
    {
        /** @var TransactionalMessagingApi $client */
        $client = $this->container->get(TransactionalMessagingApi::class);

        return $client;
    }

    #### Email or SMS not sent
    /**
     * Test case for getEmailsNotSentToRecipients
     *
     * getEmailsNotSentToRecipients.
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     * @throws \Exception
     */
    public function testGetEmailsNotSentToRecipients()
    {
        /** @var \SalesForce\MarketingCloud\Api\TransactionalMessagingApi $client */
        $client = $this->getClient();
        $response = $client->getEmailsNotSentToRecipients("notSent");

        Assert::assertNotNull($response->getRequestId());
        Assert::assertNotNull($response->getCount());
    }

    /**
     * Test case for getSMSsNotSentToRecipients
     *
     * getSMSsNotSentToRecipients.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetSMSsNotSentToRecipients()
    {
        /** @var \SalesForce\MarketingCloud\Api\TransactionalMessagingApi $client */
        $client = $this->getClient();
        $response = $client->getSMSsNotSentToRecipients("notSent");

        Assert::assertNotNull($response->getRequestId());
        Assert::assertNotNull($response->getCount());
    }

    #### Delete queued messages
    /**
     * Test case for deleteQueuedMessagesForEmailDefinition
     *
     * deleteQueuedMessagesForEmailDefinition.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDeleteQueuedMessagesForEmailDefinition()
    {
        $resourceCreator = new ResourceCreator();
        $resourceCreator->setContainer($this->container);
        $resourceCreator->setModelClass(__FUNCTION__, DeleteQueuedMessagesForSendDefinitionResponse::class);
        $resourceCreator->setClient($this->getClient());

        /** @var CreateEmailDefinitionRequest $resource */
        $resource = $resourceCreator->create();

        // The actual test
        /** @var \SalesForce\MarketingCloud\Api\TransactionalMessagingApi $client */
        $client = $this->getClient();
        $response = $client->deleteQueuedMessagesForEmailDefinition($resource->getDefinitionKey());

        Assert::assertNotNull($response->getRequestId());
    }

    /**
     * Test case for deleteQueuedMessagesForSmsDefinition
     *
     * deleteQueuedMessagesForSmsDefinition.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testDeleteQueuedMessagesForSmsDefinition()
    {
        $resourceCreator = new ResourceCreator();
        $resourceCreator->setContainer($this->container);
        $resourceCreator->setModelClass(__FUNCTION__, DeleteQueuedMessagesForSendDefinitionResponse::class);
        $resourceCreator->setClient($this->getClient());

        /** @var CreateEmailDefinitionRequest $resource */
        $resource = $resourceCreator->create();

        // The actual test
        /** @var \SalesForce\MarketingCloud\Api\TransactionalMessagingApi $client */
        $client = $this->getClient();
        $response = $client->deleteQueuedMessagesForSmsDefinition($resource->getDefinitionKey());

        Assert::assertNotNull($response->getRequestId());
    }

    #### Email or message send status
    /**
     * Test case for getEmailSendStatusForRecipient
     *
     * getEmailSendStatusForRecipient.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetEmailSendStatusForRecipient()
    {
        $eventCategories = [
            "TransactionalSendEvents.EmailSent",
            "TransactionalSendEvents.EmailQueued",
            "TransactionalSendEvents.EmailNotSent"
        ];

        $client = $this->getClient();

        // Create the email definition
        $provisioner = new EmailDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(EmailDefinitionProvider::getTestModel());
        $definition = $client->createEmailDefinition($definition);

        // Construct the email request
        $messageKey = md5(rand(0, 9999));
        $recipient = new Recipient([
            "contactKey" => "johnDoe@gmail.com"
        ]);

        $messageRequestBody = new SendEmailToSingleRecipientRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipient" => $recipient
        ]);

        // SUT
        $client->sendEmailToSingleRecipient($messageKey, $messageRequestBody);

        // Effect check
        $result = $client->getEmailSendStatusForRecipient($messageKey);

        try {
            Assert::assertNotNull($result->getRequestId());
            Assert::assertContains($result->getEventCategoryType(), $eventCategories);
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteEmailDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }

    /**
     * Test case for getSmsSendStatusForRecipient
     *
     * getSmsSendStatusForRecipient.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testGetSmsSendStatusForRecipient()
    {
        $eventCategories = [
            "TransactionalSendEvents.SMSSent",
            "TransactionalSendEvents.SMSQueued",
            "TransactionalSendEvents.SMSNotSent"
        ];

        $client = $this->getClient();

        // Create the email definition
        $provisioner = new SmsDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(SmsDefinitionProvider::getTestModel());
        $definition = $client->createSmsDefinition($definition);

        // Construct the email request
        $messageKey = md5(rand(0, 9999));
        $recipient = new Recipient([
            "contactKey" => "johnDoe@gmail.com"
        ]);

        $body = new SendSmsToSingleRecipientRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipient" => $recipient
        ]);

        // SUT
        $client->sendSmsToSingleRecipient($messageKey, $body);

        // Effect check
        $result = $client->getSmsSendStatusForRecipient($messageKey);

        try {
            Assert::assertNotNull($result->getRequestId());
            Assert::assertContains($result->getEventCategoryType(), $eventCategories);
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteSmsDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }

    #### Email or message send to multiple recipients
    /**
     * Test case for sendEmailToMultipleRecipients
     *
     * sendEmailToMultipleRecipients.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testSendEmailToMultipleRecipients()
    {
        $client = $this->getClient();

        // Create the email definition
        $provisioner = new EmailDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(EmailDefinitionProvider::getTestModel());
        $definition = $client->createEmailDefinition($definition);

        $messageRequestBody = new SendEmailToMultipleRecipientsRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipients" => [
                new Recipient(["contactKey" => "johnDoe@gmail.com"]),
                new Recipient(["contactKey" => "johnDoe2@gmail.com"]),
            ]
        ]);

        // SUT
        $result = $client->sendEmailToMultipleRecipients($messageRequestBody);

        try {
            Assert::assertNotNull($result->getRequestId());
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteEmailDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }

    /**
     * Test case for sendSmsToMultipleRecipients
     *
     * sendSmsToMultipleRecipients.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testSendSmsToMultipleRecipients()
    {
        $client = $this->getClient();

        // Create the email definition
        $provisioner = new SmsDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(SmsDefinitionProvider::getTestModel());
        $definition = $client->createSmsDefinition($definition);

        $body = new SendSmsToMultipleRecipientsRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipients" => [
                new Recipient(["contactKey" => "johnDoe@gmail.com"]),
                new Recipient(["contactKey" => "johnDoe2@gmail.com"]),
            ]
        ]);

        // SUT
        $result = $client->sendSmsToMultipleRecipients($body);

        try {
            Assert::assertNotNull($result->getRequestId());
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteSmsDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }

    #### Email or message send to single recipient
    /**
     * Test case for sendEmailToSingleRecipient
     *
     * sendEmailToSingleRecipient.
     * @throws \Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testSendEmailToSingleRecipient()
    {
        $client = $this->getClient();

        // Create the email definition
        $provisioner = new EmailDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(EmailDefinitionProvider::getTestModel());
        $definition = $client->createEmailDefinition($definition);

        // Construct the email request
        $messageKey = md5(rand(0, 9999));
        $recipient = new Recipient([
            "contactKey" => "johnDoe@gmail.com"
        ]);

        $messageRequestBody = new SendEmailToSingleRecipientRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipient" => $recipient
        ]);

        // SUT
        $result = $client->sendEmailToSingleRecipient($messageKey, $messageRequestBody);

        try {
            Assert::assertNotNull($result->getRequestId());
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteEmailDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \SalesForce\MarketingCloud\ApiException
     */
    public function testSendSmsToSingleRecipient()
    {
        $client = $this->getClient();

        // Create the email definition
        $provisioner = new SmsDefinitionProvisioner();
        $provisioner->setContainer($this->container);

        $definition = $provisioner->provision(SmsDefinitionProvider::getTestModel());
        $definition = $client->createSmsDefinition($definition);

        // Construct the email request
        $messageKey = md5(rand(0, 9999));
        $recipient = new Recipient([
            "contactKey" => "johnDoe@gmail.com"
        ]);

        $body = new SendSmsToSingleRecipientRequest([
            "definitionKey" => $definition->getDefinitionKey(),
            "recipient" => $recipient
        ]);

        // SUT
        $result = $client->sendSmsToSingleRecipient($messageKey, $body);

        try {
            Assert::assertNotNull($result->getRequestId());
        } catch (ExpectationFailedException $e) {
            throw $e;
        } finally {
            $client->deleteSmsDefinition($definition->getDefinitionKey());
            $provisioner->deplete($definition);
        }
    }
}