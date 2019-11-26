# SmsDefinition

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**definitionKey** | **string** | Unique, user-generated key to access the definition object. | 
**name** | **string** | Name of the definition. Must be unique. | 
**content** | [**\SalesForce\MarketingCloud\Model\SmsDefinitionContent**](SmsDefinitionContent.md) |  | 
**status** | **string** | Operational state of the definition: active, inactive, or deleted. A message sent to an active definition is processed and delivered. A message sent to an inactive definition isn’t processed or delivered. Instead, the message is queued for later processing for up to three days. | [optional] 
**createdDate** | [**\DateTime**](\DateTime.md) | The date the object was created. | [optional] 
**modifiedDate** | [**\DateTime**](\DateTime.md) | The date the object was modified. | [optional] 
**description** | **string** | User-provided description of the SMS definition. | [optional] 
**subscriptions** | [**\SalesForce\MarketingCloud\Model\SmsDefinitionSubscriptions**](SmsDefinitionSubscriptions.md) |  | 
**requestId** | **string** | The ID of the request | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


