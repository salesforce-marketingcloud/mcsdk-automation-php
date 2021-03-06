# Salesforce Marketing Cloud - Autogenerated SDK

## Overview

The Salesforce Marketing Cloud PHP SDK enables developers to easily access the Salesforce Marketing Cloud.

- This is an upgraded version of the existing community supported [Fuel-PHP](https://github.com/salesforce-marketingcloud/FuelSDK-PHP) SDK
- Unlike the [Fuel-PHP](https://github.com/salesforce-marketingcloud/FuelSDK-PHP), this SDK is auto generated using [Swagger Codegen](https://github.com/swagger-api/swagger-codegen)

## Supported Features

- [Transactional Messaging](https://developer.salesforce.com/docs/atlas.en-us.mc-apis.meta/mc-apis/transactional-messaging-api.htm)

## Environment Requirements

- PHP 7.3 and later

## Download

To consume this SDK, add the [Salesforce Marketing Cloud SDK](https://packagist.org/packages/salesforce-mc/marketing-cloud-sdk) to your project using the following command:

```composer require salesforce-mc/marketing-cloud-sdk```

## Getting Started

### Usage scenarios
#### 1.Basic usage

Please *note* that the configuration in this scenario is taken from the environment variables.
```

$client = new SalesForce\MarketingCloud\Api\Client();
$assetApi = $client->getAssetApi();

$asset = new SalesForce\MarketingCloud\Model\Asset();

try {
    $result = $assetApi->createAsset($asset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetApi->createAsset: ', $e->getMessage(), PHP_EOL;
}
```

*Environment variables:*
* SFMC_ACCOUNT_ID
* SFMC_AUTH_BASE_URL  (Authentication TSE)
* SFMC_CLIENT_ID
* SFMC_CLIENT_SECRET
* SFMC_COUNTRY_CODE   (eg: US)
* SFMC_KEYWORD        (SMS keyword)
* SFMC_SHORT_CODE     (SMS short code)

#### 2.Setting the configuration from code using the configuration builder
```
use Symfony\Component\DependencyInjection\ContainerBuilder;

$client = new SalesForce\MarketingCloud\Api\Client(null, null, false);

$config = $client->getConfig();
$config->setAccountId('YOUR_ACCOUNT_ID')
    ->setClientId('YOUR_CLIENT_ID')
    ->setClientSecret('YOUR_CLIENT_SECRET')
    ->setAuthBaseUrl('YOUR_AUTH_TSE')
    ->setAccessTokenUrl('YOUR_AUTH_TSE')
    ->setResourceOwnerDetailsUrl('');

$assetApi = $client->getAssetApi();
$asset = new SalesForce\MarketingCloud\Model\Asset();

try {
    $result = $assetApi->createAsset($asset);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AssetApi->createAsset: ', $e->getMessage(), PHP_EOL;
}
```

To find more information on how to consume the SDK, Refer to the [Regression tests](https://github.com/salesforce-marketingcloud/mcsdk-automation-php/tree/master/src/TestHelper/Decorator) or the [Code Samples](https://github.com/salesforce-marketingcloud/mcsdk-automation-php/tree/master/samples)

### Note

- Most of the code in this repo is auto generated from the [mcsdk-automation-framework-core](https://github.com/salesforce-marketingcloud/mcsdk-automation-framework-core) and the [mcsdk-automation-framework-php](https://github.com/salesforce-marketingcloud/mcsdk-automation-framework-php) repos. Other features like authentication flow, caching are directly implemented in this repo.
- If any change is needed in the auto generated code, it has to come from the [mcsdk-automation-framework-core](https://github.com/salesforce-marketingcloud/mcsdk-automation-framework-core) or the [mcsdk-automation-framework-php](https://github.com/salesforce-marketingcloud/mcsdk-automation-framework-php) repos.
- If any change is needed in the auth flow or caching, it should be done in this repo.

## Contact us

- Request a [new feature](https://github.com/salesforce-marketingcloud/mcsdk-automation-php/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc), add a question or report a bug on GitHub.
- Vote for [Popular Feature Requests](https://github.com/salesforce-marketingcloud/mcsdk-automation-php/issues?q=is%3Aissue+is%3Aopen+sort%3Aupdated-desc) by making relevant comments and add your reaction. Use a reaction in place of a "+1" comment:
- 👍 - upvote
- 👎 - downvote

## License
By contributing your code, you agree to license your contribution under the terms of the [BSD 3-Clause License](https://github.com/salesforce-marketingcloud/mcsdk-automation-php/blob/master/license.md).
