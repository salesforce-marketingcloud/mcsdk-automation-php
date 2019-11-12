<?php

use SalesForce\MarketingCloud\Model\AssetType;
use SalesForce\MarketingCloud\Model\Asset;
use SalesForce\MarketingCloud\Api\AssetApi;
use SalesForce\MarketingCloud\ApiException;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionContent;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionSubscriptions;
use SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest;
use GuzzleHttp\Exception\GuzzleException;

class SampleHelper
{
    const HTML_EMAIL_ASSET_TYPE_ID = 208;
    const ASSET_TYPE_NAME = 'htmlemail';

    /* Replace 'SUBSCRIBERS-LIST-KEY' with the key of
    one of your subscribers lists or use 'All Subscribers'*/

    const SUBSCRIBERS_LIST_KEY = 'SUBSCRIBERS-LIST-KEY';

    public static function createEmailDefinitionObject(AssetApi $assetApi)
    {
        $emailAsset = SampleHelper::createEmailAsset();

        try {
            $createAssetResponse = $assetApi->createAsset($emailAsset);
            $customerKey = $createAssetResponse->getCustomerKey();
            $emailDefinitionName = md5(rand(0, 9999));                  // it has be unique
            $emailDefinitionKey = md5(rand(0, 9999));                   // it has be unique
            $emailDefinitionContent = new CreateEmailDefinitionContent([
                "customerKey" => $customerKey
            ]);
            $emailDefinitionSubscriptions = new CreateEmailDefinitionSubscriptions([
                "list" => SampleHelper::SUBSCRIBERS_LIST_KEY
            ]);

            return new CreateEmailDefinitionRequest([
                'name' => $emailDefinitionName,
                'definitionKey' => $emailDefinitionKey,
                'content' => $emailDefinitionContent,
                'subscriptions' => $emailDefinitionSubscriptions
            ]);
        } catch (ApiException $e) {
            echo 'Exception when calling $assetApi->createAsset: ', $e->getMessage(), PHP_EOL;
        } catch (GuzzleException $e) {
            echo 'Exception when calling $assetApi->createAsset: ', $e->getMessage(), PHP_EOL;
        }
        return null;
    }

    private static function createEmailAsset()
    {
        $customerKey = md5(rand(0, 9999));                  // it has be unique
        $assetName = md5(rand(0, 9999));                    // it has be unique
        $assetDescription = 'EmailAsset created from automated PHP SDK';
        $assetType = SampleHelper::createAssetType();

        return new Asset(
            [
                'name' => $assetName,
                'description' => $assetDescription,
                'customerKey' => $customerKey,
                'assetType' => $assetType,
                'views' => [
                    'subjectline' => [
                        'content' => "Email generated from the PHP SDK"
                    ],
                    'html' => [
                        'content' => '<!DOCTYPE html>
                                      <html lang="en">
                                      <head>
                                            <meta charset="UTF-8">
                                            <title>Welcome to SFMC Transactional Messaging</title>
                                      </head>
                                      <body>
                                          <img src="https://image.slidesharecdn.com/scalingdevelopereffortswithsalesforcemarketingcloudpptxv4-180803183610/95/scaling-developer-efforts-with-salesforce-marketing-cloud-31-638.jpg?cb=1533321419"
                                                alt="Let\'s Talk TM image">
                                      </body>
                                      </html>'
                    ]
                ]
            ]
        );
    }

    private static function createAssetType(): AssetType
    {
        return new AssetType([
            "id" => SampleHelper::HTML_EMAIL_ASSET_TYPE_ID,
            "name" => SampleHelper::ASSET_TYPE_NAME,
        ]);
    }
}