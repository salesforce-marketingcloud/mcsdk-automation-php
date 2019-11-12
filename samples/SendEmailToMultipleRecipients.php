<?php

include '../vendor/autoload.php';
include '../samples/SampleHelper.php';

use GuzzleHttp\Exception\GuzzleException;
use SalesForce\MarketingCloud\Api\Client;
use SalesForce\MarketingCloud\ApiException;
use SalesForce\MarketingCloud\Model\Recipient;
use SalesForce\MarketingCloud\Model\SendEmailToMultipleRecipientsRequest;

// Replace 'CONTACT1_KEY' and 'CONTACT2_KEY' with real subscriber keys
const CONTACT1_KEY = 'CONTACT1_KEY';
const CONTACT2_KEY = 'CONTACT2_KEY';

$client = new Client();

try {
    // Get the the asset, transactional messaging API instances:
    $assetApi = $client->getAssetApi();
    $transactionalMessagingApi = $client->getTransactionalMessagingApi();

    // Create email send definition:
    $emailDefinitionObject = SampleHelper::createEmailDefinitionObject($assetApi);
    $createEmailDefinitionResult = $transactionalMessagingApi->createEmailDefinition($emailDefinitionObject);

    // Send email to multiple recipients:
    $firstRecipientMessageKey = md5(rand(0, 9999));
    $recipient1 = new Recipient([
        "contactKey" => CONTACT1_KEY,
        "messageKey" => $firstRecipientMessageKey
    ]);

    $secondRecipientMessageKey = md5(rand(0, 9999));
    $recipient2 = new Recipient([
        "contactKey" => CONTACT2_KEY,
        "messageKey" => $secondRecipientMessageKey
    ]);
    $recipientsList = [$recipient1, $recipient2];

    $batchMessageRequestBody = new SendEmailToMultipleRecipientsRequest([
        "definitionKey" => $createEmailDefinitionResult->getDefinitionKey(),
        "recipients" => $recipientsList
    ]);
    $sendEmailToMultipleRecipientsResult = $transactionalMessagingApi->sendEmailToMultipleRecipients($batchMessageRequestBody);

    // Get the send status of the two email sends:
    $firstRecipientSendStatus = $transactionalMessagingApi->getEmailSendStatusForRecipient($firstRecipientMessageKey);
    $secondRecipientSendStatus = $transactionalMessagingApi->getEmailSendStatusForRecipient($secondRecipientMessageKey);

} catch (GuzzleException $e) {
    echo $e->getMessage(), PHP_EOL;
} catch (ApiException $e) {
    echo $e->getMessage(), PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
