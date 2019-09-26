# SalesForce\MarketingCloud\CampaignApi

All URIs are relative to *https://www.exacttargetapis.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createCampaign**](CampaignApi.md#createCampaign) | **POST** /hub/v1/campaigns | createCampaign
[**deleteCampaignById**](CampaignApi.md#deleteCampaignById) | **DELETE** /hub/v1/campaigns/{id} | deleteCampaignById
[**getCampaignById**](CampaignApi.md#getCampaignById) | **GET** /hub/v1/campaigns/{id} | getCampaignById


# **createCampaign**
> \SalesForce\MarketingCloud\Model\Campaign createCampaign($body)

createCampaign

Creates a campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \SalesForce\MarketingCloud\Model\Campaign(); // \SalesForce\MarketingCloud\Model\Campaign | JSON Parameters

try {
    $result = $apiInstance->createCampaign($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->createCampaign: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\SalesForce\MarketingCloud\Model\Campaign**](../Model/Campaign.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteCampaignById**
> deleteCampaignById($id)

deleteCampaignById

Deletes a campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | The ID of the campaign to delete

try {
    $apiInstance->deleteCampaignById($id);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->deleteCampaignById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| The ID of the campaign to delete |

### Return type

void (empty response body)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getCampaignById**
> \SalesForce\MarketingCloud\Model\Campaign getCampaignById($id)

getCampaignById

Retrieves a campaign.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\CampaignApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$id = "id_example"; // string | Campaign ID

try {
    $result = $apiInstance->getCampaignById($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling CampaignApi->getCampaignById: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Campaign ID |

### Return type

[**\SalesForce\MarketingCloud\Model\Campaign**](../Model/Campaign.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

