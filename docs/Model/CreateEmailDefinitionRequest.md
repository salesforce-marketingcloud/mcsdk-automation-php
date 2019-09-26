# CreateEmailDefinitionRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**requestId** | **string** | The ID of the request | [optional] 
**name** | **string** | Name of the definition. Must be unique. | 
**definitionKey** | **string** | Unique, user-generated key to access the definition object. | 
**definitionId** | **string** | Definition Id | [optional] 
**description** | **string** | User-provided description of the email definition. | [optional] 
**classification** | **string** | Marketing Cloud external key of a sending classification defined in Email Studio Administration. Only transactional classifications are permitted. Default is default transactional. | [optional] 
**status** | **string** | Operational state of the definition: active, inactive, or deleted. A message sent to an active definition is processed and delivered. A message sent to an inactive definition isn’t processed or delivered. Instead, the message is queued for later processing for up to three days. | [optional] 
**createdDate** | [**\DateTime**](\DateTime.md) | The date the object was created. | [optional] 
**modifiedDate** | [**\DateTime**](\DateTime.md) | The date the object was modified. | [optional] 
**content** | [**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionContent**](CreateEmailDefinitionContent.md) |  | 
**subscriptions** | [**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionSubscriptions**](CreateEmailDefinitionSubscriptions.md) |  | 
**options** | [**\SalesForce\MarketingCloud\Model\CreateEmailDefinitionOptionsRequest**](CreateEmailDefinitionOptionsRequest.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


