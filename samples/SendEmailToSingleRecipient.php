<?php

include '../vendor/autoload.php';
include '../samples/SampleHelper.php';

use SalesForce\MarketingCloud\Api\Client;
use GuzzleHttp\Exception\GuzzleException;
use SalesForce\MarketingCloud\ApiException;
use SalesForce\MarketingCloud\Model\Recipient;
use SalesForce\MarketingCloud\Model\SendEmailToSingleRecipientRequest;
use SalesForce\MarketingCloud\Model\UpdateEmailDefinitionRequest;

// Replace 'CONTACT_KEY' with a real subscriber key
const CONTACT_KEY = 'CONTACT_KEY';

$client = new Client(null, null, false);

$config = $client->getConfig();

$config->setAccountId('YOUR ACCOUNT ID')
    ->setClientId('YOUR CLIENT ID')
    ->setClientSecret('YOUR CLIENT SECRET')
    ->setAuthBaseUrl('YOUR AUTH BASE URL')
    ->setAccessTokenUrl('YOUR AUTH BASE URL')
    ->setResourceOwnerDetailsUrl('');

try {
    // Get the the asset, transactional messaging API instances:
    $assetApi = $client->getAssetApi();
    $transactionalMessagingApi = $client->getTransactionalMessagingApi();

    // Create email send definition:
    $emailDefinitionObject = SampleHelper::createEmailDefinitionObject($assetApi);
    $createEmailDefinitionResult = $transactionalMessagingApi->createEmailDefinition($emailDefinitionObject);

    // Get email send definition:
    $getEmailDefinitionsResult = $transactionalMessagingApi->getEmailDefinition($createEmailDefinitionResult->getDefinitionKey());

    // Update email send definition:
    $updatedDefinitionDescription = new UpdateEmailDefinitionRequest();
    $updatedDefinitionDescription->setDescription('Updated email definition description');
    $partiallyUpdateEmailDefinitionResult = $transactionalMessagingApi->partiallyUpdateEmailDefinition($createEmailDefinitionResult->getDefinitionKey(), $updatedDefinitionDescription);

    // Get email send definition:
    $getEmailDefinitionsResult = $transactionalMessagingApi->getEmailDefinition($createEmailDefinitionResult->getDefinitionKey());

    // Send email to single recipient:
    $recipient = new Recipient([
        "contactKey" => CONTACT_KEY
    ]);

    $messageKey = md5(rand(0, 9999));
    $messageRequestBody = new SendEmailToSingleRecipientRequest([
        "definitionKey" => $createEmailDefinitionResult->getDefinitionKey(),
        "recipient" => $recipient
    ]);
    $sendEmailToSingleRecipientResult = $transactionalMessagingApi->sendEmailToSingleRecipient($messageKey, $messageRequestBody);

    // Get the send status of the email send:
    $recipientSendStatus = $transactionalMessagingApi->getEmailSendStatusForRecipient($messageKey);

} catch (GuzzleException $e) {
    echo $e->getMessage(), PHP_EOL;
} catch (ApiException $e) {
    echo $e->getMessage(), PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
