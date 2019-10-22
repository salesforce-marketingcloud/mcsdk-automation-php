# SalesForce\MarketingCloud\TransactionalMessagingApi

All URIs are relative to *https://www.exacttargetapis.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createEmailDefinition**](TransactionalMessagingApi.md#createEmailDefinition) | **POST** /messaging/v1/email/definitions/ | createEmailDefinition
[**createSmsDefinition**](TransactionalMessagingApi.md#createSmsDefinition) | **POST** /messaging/v1/sms/definitions | createSmsDefinition
[**deleteEmailDefinition**](TransactionalMessagingApi.md#deleteEmailDefinition) | **DELETE** /messaging/v1/email/definitions/{definitionKey} | deleteEmailDefinition
[**deleteQueuedMessagesForEmailDefinition**](TransactionalMessagingApi.md#deleteQueuedMessagesForEmailDefinition) | **DELETE** /messaging/v1/email/definitions/{definitionKey}/queue | deleteQueuedMessagesForEmailDefinition
[**deleteQueuedMessagesForSmsDefinition**](TransactionalMessagingApi.md#deleteQueuedMessagesForSmsDefinition) | **DELETE** /messaging/v1/sms/definitions/{definitionKey}/queue | deleteQueuedMessagesForSmsDefinition
[**deleteSmsDefinition**](TransactionalMessagingApi.md#deleteSmsDefinition) | **DELETE** /messaging/v1/sms/definitions/{definitionKey} | deleteSmsDefinition
[**getEmailDefinition**](TransactionalMessagingApi.md#getEmailDefinition) | **GET** /messaging/v1/email/definitions/{definitionKey} | getEmailDefinition
[**getEmailDefinitions**](TransactionalMessagingApi.md#getEmailDefinitions) | **GET** /messaging/v1/email/definitions/ | getEmailDefinitions
[**getEmailSendStatusForRecipient**](TransactionalMessagingApi.md#getEmailSendStatusForRecipient) | **GET** /messaging/v1/email/messages/{messageKey} | getEmailSendStatusForRecipient
[**getEmailsNotSentToRecipients**](TransactionalMessagingApi.md#getEmailsNotSentToRecipients) | **GET** /messaging/v1/email/messages/ | getEmailsNotSentToRecipients
[**getQueueMetricsForEmailDefinition**](TransactionalMessagingApi.md#getQueueMetricsForEmailDefinition) | **GET** /messaging/v1/email/definitions/{definitionKey}/queue | getQueueMetricsForEmailDefinition
[**getQueueMetricsForSmsDefinition**](TransactionalMessagingApi.md#getQueueMetricsForSmsDefinition) | **GET** /messaging/v1/sms/definitions/{definitionKey}/queue | getQueueMetricsForSmsDefinition
[**getSMSsNotSentToRecipients**](TransactionalMessagingApi.md#getSMSsNotSentToRecipients) | **GET** /messaging/v1/sms/messages/ | getSMSsNotSentToRecipients
[**getSmsDefinition**](TransactionalMessagingApi.md#getSmsDefinition) | **GET** /messaging/v1/sms/definitions/{definitionKey} | getSmsDefinition
[**getSmsDefinitions**](TransactionalMessagingApi.md#getSmsDefinitions) | **GET** /messaging/v1/sms/definitions | getSmsDefinitions
[**getSmsSendStatusForRecipient**](TransactionalMessagingApi.md#getSmsSendStatusForRecipient) | **GET** /messaging/v1/sms/messages/{messageKey} | getSmsSendStatusForRecipient
[**partiallyUpdateEmailDefinition**](TransactionalMessagingApi.md#partiallyUpdateEmailDefinition) | **PATCH** /messaging/v1/email/definitions/{definitionKey} | partiallyUpdateEmailDefinition
[**partiallyUpdateSmsDefinition**](TransactionalMessagingApi.md#partiallyUpdateSmsDefinition) | **PATCH** /messaging/v1/sms/definitions/{definitionKey} | partiallyUpdateSmsDefinition
[**sendEmailToMultipleRecipients**](TransactionalMessagingApi.md#sendEmailToMultipleRecipients) | **POST** /messaging/v1/email/messages/ | sendEmailToMultipleRecipients
[**sendEmailToSingleRecipient**](TransactionalMessagingApi.md#sendEmailToSingleRecipient) | **POST** /messaging/v1/email/messages/{messageKey} | sendEmailToSingleRecipient
[**sendSmsToMultipleRecipients**](TransactionalMessagingApi.md#sendSmsToMultipleRecipients) | **POST** /messaging/v1/sms/messages/ | sendSmsToMultipleRecipients
[**sendSmsToSingleRecipient**](TransactionalMessagingApi.md#sendSmsToSingleRecipient) | **POST** /messaging/v1/sms/messages/{messageKey} | sendSmsToSingleRecipient


# **createEmailDefinition**
> \SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest createEmailDefinition($body)

createEmailDefinition

Creates the definition for an email.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest(); // \SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest | JSON Parameters

try {
    $result = $apiInstance->createEmailDefinition($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->createEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest**](../Model/CreateEmailDefinitionRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest**](../Model/CreateEmailDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSmsDefinition**
> \SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest createSmsDefinition($body)

createSmsDefinition

Creates the definition for an SMS.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest(); // \SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest | JSON Parameters

try {
    $result = $apiInstance->createSmsDefinition($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->createSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest**](../Model/CreateSmsDefinitionRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest**](../Model/CreateSmsDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteEmailDefinition**
> \SalesForce\MarketingCloud\Model\DeleteSendDefinitionResponse deleteEmailDefinition($definitionKey)

deleteEmailDefinition

Deletes an email definition. You can't restore a deleted definition. The deleted definition is archived, and a delete location of the definition key is provided in the response for reference. You can reuse a deleted definition key because the information associated with it is copied to a new unique identifier.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition to delete

try {
    $result = $apiInstance->deleteEmailDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->deleteEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition to delete |

### Return type

[**\SalesForce\MarketingCloud\Model\DeleteSendDefinitionResponse**](../Model/DeleteSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteQueuedMessagesForEmailDefinition**
> \SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse deleteQueuedMessagesForEmailDefinition($definitionKey)

deleteQueuedMessagesForEmailDefinition

Deletes the queue for an email definition. The email definition must be in inactive status.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the email definition

try {
    $result = $apiInstance->deleteQueuedMessagesForEmailDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->deleteQueuedMessagesForEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the email definition |

### Return type

[**\SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse**](../Model/DeleteQueuedMessagesForSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteQueuedMessagesForSmsDefinition**
> \SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse deleteQueuedMessagesForSmsDefinition($definitionKey)

deleteQueuedMessagesForSmsDefinition

Deletes the queue for a SMS definition. The SMS definition must be in inactive status.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the SMS definition

try {
    $result = $apiInstance->deleteQueuedMessagesForSmsDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->deleteQueuedMessagesForSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the SMS definition |

### Return type

[**\SalesForce\MarketingCloud\Model\DeleteQueuedMessagesForSendDefinitionResponse**](../Model/DeleteQueuedMessagesForSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSmsDefinition**
> \SalesForce\MarketingCloud\Model\DeleteSendDefinitionResponse deleteSmsDefinition($definitionKey)

deleteSmsDefinition

Deletes an sms definition. You can't restore a deleted definition. The deleted definition is archived, and a delete location of the definition key is provided in the response for reference. You can reuse a deleted definition key because the information associated with it is copied to a new unique identifier.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition to delete

try {
    $result = $apiInstance->deleteSmsDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->deleteSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition to delete |

### Return type

[**\SalesForce\MarketingCloud\Model\DeleteSendDefinitionResponse**](../Model/DeleteSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEmailDefinition**
> \SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest getEmailDefinition($definitionKey)

getEmailDefinition

Gets email definition configuration details for a definition key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition to get

try {
    $result = $apiInstance->getEmailDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition to get |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest**](../Model/CreateEmailDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEmailDefinitions**
> \SalesForce\MarketingCloud\Model\GetEmailDefinitionsResponse getEmailDefinitions($status, $pageSize, $page, $orderBy)

getEmailDefinitions

Gets a list of email definitions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$status = "status_example"; // string | Filter by status type. Accepted values are active, inactive, or deleted. Valid operations are eq and neq.
$pageSize = 8.14; // float | Number of definitions, which are array elements, to return per paged response.
$page = 8.14; // float | Page number to return.
$orderBy = "orderBy_example"; // string | Sort by a dimension. You can sort by only one dimension. Accepted values are definitionKey, name, createdDate, modifiedDate, and status.

try {
    $result = $apiInstance->getEmailDefinitions($status, $pageSize, $page, $orderBy);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getEmailDefinitions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **status** | **string**| Filter by status type. Accepted values are active, inactive, or deleted. Valid operations are eq and neq. | [optional]
 **pageSize** | **float**| Number of definitions, which are array elements, to return per paged response. | [optional]
 **page** | **float**| Page number to return. | [optional]
 **orderBy** | **string**| Sort by a dimension. You can sort by only one dimension. Accepted values are definitionKey, name, createdDate, modifiedDate, and status. | [optional]

### Return type

[**\SalesForce\MarketingCloud\Model\GetEmailDefinitionsResponse**](../Model/GetEmailDefinitionsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEmailSendStatusForRecipient**
> \SalesForce\MarketingCloud\Model\GetDefinitionSendStatusForRecipientResponse getEmailSendStatusForRecipient($messageKey)

getEmailSendStatusForRecipient

Gets the send status for a message. Because this route is rate-limited, use it for infrequent verification of a messageKey. To collect send status at scale, subscribe to transactional send events using the Event Notification Service.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$messageKey = "messageKey_example"; // string | Unique identifier to track message send status. You must provide it in singleton requests using the recipient attribute. To provide it in batch requests, use the recipients array attribute. If you don’t provide the message key for recipients, it’s generated in the response.

try {
    $result = $apiInstance->getEmailSendStatusForRecipient($messageKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getEmailSendStatusForRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **messageKey** | **string**| Unique identifier to track message send status. You must provide it in singleton requests using the recipient attribute. To provide it in batch requests, use the recipients array attribute. If you don’t provide the message key for recipients, it’s generated in the response. |

### Return type

[**\SalesForce\MarketingCloud\Model\GetDefinitionSendStatusForRecipientResponse**](../Model/GetDefinitionSendStatusForRecipientResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEmailsNotSentToRecipients**
> \SalesForce\MarketingCloud\Model\GetDefinitionsNotSentToRecipientsResponse getEmailsNotSentToRecipients($type, $pageSize, $lastEventId)

getEmailsNotSentToRecipients

Gets a paginated list of messages that were not sent, ordered from oldest to newest.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$type = "type_example"; // string | Only notSent is supported.
$pageSize = 56; // int | Number of messageKeys (array elements) to return per response page.
$lastEventId = 56; // int | Event ID from which you want the response to start. To obtain the initial event ID, submit a request without a lastEventId. The events in the response are listed top to bottom from oldest to newest.

try {
    $result = $apiInstance->getEmailsNotSentToRecipients($type, $pageSize, $lastEventId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getEmailsNotSentToRecipients: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| Only notSent is supported. |
 **pageSize** | **int**| Number of messageKeys (array elements) to return per response page. | [optional]
 **lastEventId** | **int**| Event ID from which you want the response to start. To obtain the initial event ID, submit a request without a lastEventId. The events in the response are listed top to bottom from oldest to newest. | [optional]

### Return type

[**\SalesForce\MarketingCloud\Model\GetDefinitionsNotSentToRecipientsResponse**](../Model/GetDefinitionsNotSentToRecipientsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getQueueMetricsForEmailDefinition**
> \SalesForce\MarketingCloud\Model\GetQueueMetricsForSendDefinitionResponse getQueueMetricsForEmailDefinition($definitionKey)

getQueueMetricsForEmailDefinition

Gets metrics for the messages of an email definition. Applies to messages that are accepted but not yet processed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the email definition

try {
    $result = $apiInstance->getQueueMetricsForEmailDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getQueueMetricsForEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the email definition |

### Return type

[**\SalesForce\MarketingCloud\Model\GetQueueMetricsForSendDefinitionResponse**](../Model/GetQueueMetricsForSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getQueueMetricsForSmsDefinition**
> \SalesForce\MarketingCloud\Model\GetQueueMetricsForSendDefinitionResponse getQueueMetricsForSmsDefinition($definitionKey)

getQueueMetricsForSmsDefinition

Gets metrics for the messages of a SMS definition. Applies to messages that are accepted but not yet processed.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the SMS definition

try {
    $result = $apiInstance->getQueueMetricsForSmsDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getQueueMetricsForSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the SMS definition |

### Return type

[**\SalesForce\MarketingCloud\Model\GetQueueMetricsForSendDefinitionResponse**](../Model/GetQueueMetricsForSendDefinitionResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSMSsNotSentToRecipients**
> \SalesForce\MarketingCloud\Model\GetDefinitionsNotSentToRecipientsResponse getSMSsNotSentToRecipients($type, $pageSize, $lastEventId)

getSMSsNotSentToRecipients

Gets a paginated list of messages that were not sent, ordered from oldest to newest.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$type = "type_example"; // string | Only notSent is supported.
$pageSize = 56; // int | Number of messageKeys (array elements) to return per response page.
$lastEventId = 56; // int | Event ID from which you want the response to start. To obtain the initial event ID, submit a request without a lastEventId. The events in the response are listed top to bottom from oldest to newest.

try {
    $result = $apiInstance->getSMSsNotSentToRecipients($type, $pageSize, $lastEventId);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getSMSsNotSentToRecipients: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **type** | **string**| Only notSent is supported. |
 **pageSize** | **int**| Number of messageKeys (array elements) to return per response page. | [optional]
 **lastEventId** | **int**| Event ID from which you want the response to start. To obtain the initial event ID, submit a request without a lastEventId. The events in the response are listed top to bottom from oldest to newest. | [optional]

### Return type

[**\SalesForce\MarketingCloud\Model\GetDefinitionsNotSentToRecipientsResponse**](../Model/GetDefinitionsNotSentToRecipientsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSmsDefinition**
> \SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest getSmsDefinition($definitionKey)

getSmsDefinition

Gets SMS definition configuration details for a definition key.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition to get

try {
    $result = $apiInstance->getSmsDefinition($definitionKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition to get |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest**](../Model/CreateSmsDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSmsDefinitions**
> \SalesForce\MarketingCloud\Model\GetSmsDefinitionsResponse getSmsDefinitions($status, $pageSize, $page, $orderBy)

getSmsDefinitions

Gets a list of SMS definitions.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$status = "status_example"; // string | Filter by status type. Accepted values are active, inactive, or deleted. Valid operations are eq and neq.
$pageSize = 8.14; // float | Number of definitions, which are array elements, to return per paged response.
$page = 8.14; // float | Page number to return.
$orderBy = "orderBy_example"; // string | Sort by a dimension. You can sort by only one dimension. Accepted values are definitionKey, name, createdDate, modifiedDate, and status.

try {
    $result = $apiInstance->getSmsDefinitions($status, $pageSize, $page, $orderBy);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getSmsDefinitions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **status** | **string**| Filter by status type. Accepted values are active, inactive, or deleted. Valid operations are eq and neq. | [optional]
 **pageSize** | **float**| Number of definitions, which are array elements, to return per paged response. | [optional]
 **page** | **float**| Page number to return. | [optional]
 **orderBy** | **string**| Sort by a dimension. You can sort by only one dimension. Accepted values are definitionKey, name, createdDate, modifiedDate, and status. | [optional]

### Return type

[**\SalesForce\MarketingCloud\Model\GetSmsDefinitionsResponse**](../Model/GetSmsDefinitionsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSmsSendStatusForRecipient**
> \SalesForce\MarketingCloud\Model\GetDefinitionSendStatusForRecipientResponse getSmsSendStatusForRecipient($messageKey)

getSmsSendStatusForRecipient

Gets the send status for a message. Because this route is rate-limited, use it for infrequent verification of a messageKey. To collect send status at scale, subscribe to transactional send events using the Event Notification Service.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$messageKey = "messageKey_example"; // string | Unique identifier to track message send status. You must provide it in singleton requests using the recipient attribute. To provide message key in batch requests, use the recipients array attribute. If you don’t provide the message key for recipients, it’s generated in the response.

try {
    $result = $apiInstance->getSmsSendStatusForRecipient($messageKey);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->getSmsSendStatusForRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **messageKey** | **string**| Unique identifier to track message send status. You must provide it in singleton requests using the recipient attribute. To provide message key in batch requests, use the recipients array attribute. If you don’t provide the message key for recipients, it’s generated in the response. |

### Return type

[**\SalesForce\MarketingCloud\Model\GetDefinitionSendStatusForRecipientResponse**](../Model/GetDefinitionSendStatusForRecipientResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **partiallyUpdateEmailDefinition**
> \SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest partiallyUpdateEmailDefinition($definitionKey, $body)

partiallyUpdateEmailDefinition

Updates a specific email definition.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition.
$body = new \SalesForce\MarketingCloud\Model\UpdateEmailDefinitionRequest(); // \SalesForce\MarketingCloud\Model\UpdateEmailDefinitionRequest | JSON Parameters

try {
    $result = $apiInstance->partiallyUpdateEmailDefinition($definitionKey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->partiallyUpdateEmailDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition. |
 **body** | [**\SalesForce\MarketingCloud\Model\UpdateEmailDefinitionRequest**](../Model/UpdateEmailDefinitionRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionRequest**](../Model/CreateEmailDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **partiallyUpdateSmsDefinition**
> \SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest partiallyUpdateSmsDefinition($definitionKey, $body)

partiallyUpdateSmsDefinition

Updates a specific SMS definition.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$definitionKey = "definitionKey_example"; // string | Unique identifier of the definition.
$body = new \SalesForce\MarketingCloud\Model\UpdateSmsDefinitionRequest(); // \SalesForce\MarketingCloud\Model\UpdateSmsDefinitionRequest | JSON Parameters

try {
    $result = $apiInstance->partiallyUpdateSmsDefinition($definitionKey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->partiallyUpdateSmsDefinition: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **definitionKey** | **string**| Unique identifier of the definition. |
 **body** | [**\SalesForce\MarketingCloud\Model\UpdateSmsDefinitionRequest**](../Model/UpdateSmsDefinitionRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\CreateSmsDefinitionRequest**](../Model/CreateSmsDefinitionRequest.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendEmailToMultipleRecipients**
> \SalesForce\MarketingCloud\Model\SendDefinitionToMultipleRecipientsResponse sendEmailToMultipleRecipients($body)

sendEmailToMultipleRecipients

Sends a message to multiple recipients using an email definition. You can provide a messageKey in the request; otherwise, the messageKey is automatically generated in the response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \SalesForce\MarketingCloud\Model\SendEmailToMultipleRecipientsRequest(); // \SalesForce\MarketingCloud\Model\SendEmailToMultipleRecipientsRequest | JSON Parameters

try {
    $result = $apiInstance->sendEmailToMultipleRecipients($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->sendEmailToMultipleRecipients: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\SalesForce\MarketingCloud\Model\SendEmailToMultipleRecipientsRequest**](../Model/SendEmailToMultipleRecipientsRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\SendDefinitionToMultipleRecipientsResponse**](../Model/SendDefinitionToMultipleRecipientsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendEmailToSingleRecipient**
> \SalesForce\MarketingCloud\Model\SendDefinitionToSingleRecipientResponse sendEmailToSingleRecipient($messageKey, $body)

sendEmailToSingleRecipient

Sends a message to a single recipient via an email definition using a messageKey path parameter.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$messageKey = "messageKey_example"; // string | Unique identifier used to track message status. Can be automatically created when you create a message or provided as part of the request. Each recipient in a request must have a unique messageKey. If you use a duplicate messageKey in the same send request, the message is rejected.
$body = new \SalesForce\MarketingCloud\Model\SendEmailToSingleRecipientRequest(); // \SalesForce\MarketingCloud\Model\SendEmailToSingleRecipientRequest | JSON Parameters

try {
    $result = $apiInstance->sendEmailToSingleRecipient($messageKey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->sendEmailToSingleRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **messageKey** | **string**| Unique identifier used to track message status. Can be automatically created when you create a message or provided as part of the request. Each recipient in a request must have a unique messageKey. If you use a duplicate messageKey in the same send request, the message is rejected. |
 **body** | [**\SalesForce\MarketingCloud\Model\SendEmailToSingleRecipientRequest**](../Model/SendEmailToSingleRecipientRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\SendDefinitionToSingleRecipientResponse**](../Model/SendDefinitionToSingleRecipientResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendSmsToMultipleRecipients**
> \SalesForce\MarketingCloud\Model\SendDefinitionToMultipleRecipientsResponse sendSmsToMultipleRecipients($body)

sendSmsToMultipleRecipients

Sends a message to multiple recipients using an email definition. You can provide a messageKey in the request; otherwise, the messageKey is automatically generated in the response.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$body = new \SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsRequest(); // \SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsRequest | JSON Parameters

try {
    $result = $apiInstance->sendSmsToMultipleRecipients($body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->sendSmsToMultipleRecipients: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **body** | [**\SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsRequest**](../Model/SendSmsToMultipleRecipientsRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\SendDefinitionToMultipleRecipientsResponse**](../Model/SendDefinitionToMultipleRecipientsResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **sendSmsToSingleRecipient**
> \SalesForce\MarketingCloud\Model\SendDefinitionToSingleRecipientResponse sendSmsToSingleRecipient($messageKey, $body)

sendSmsToSingleRecipient

Sends a message to a single recipient via a SMS definition using a messageKey path parameter.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new SalesForce\MarketingCloud\Api\TransactionalMessagingApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client()
);
$messageKey = "messageKey_example"; // string | Unique identifier of the definition used to track message status. The messageKey can be created automatically when you create a message, or you can provide it as part of the request. Each recipient in a request must have a unique messageKey. If you use a duplicate messageKey in the same send request, the message is rejected.
$body = new \SalesForce\MarketingCloud\Model\SendSmsToSingleRecipientRequest(); // \SalesForce\MarketingCloud\Model\SendSmsToSingleRecipientRequest | JSON Parameters

try {
    $result = $apiInstance->sendSmsToSingleRecipient($messageKey, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling TransactionalMessagingApi->sendSmsToSingleRecipient: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **messageKey** | **string**| Unique identifier of the definition used to track message status. The messageKey can be created automatically when you create a message, or you can provide it as part of the request. Each recipient in a request must have a unique messageKey. If you use a duplicate messageKey in the same send request, the message is rejected. |
 **body** | [**\SalesForce\MarketingCloud\Model\SendSmsToSingleRecipientRequest**](../Model/SendSmsToSingleRecipientRequest.md)| JSON Parameters |

### Return type

[**\SalesForce\MarketingCloud\Model\SendDefinitionToSingleRecipientResponse**](../Model/SendDefinitionToSingleRecipientResponse.md)

### Authorization

No authorization required

### HTTP request headers

 - **Content-Type**: Not defined
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

