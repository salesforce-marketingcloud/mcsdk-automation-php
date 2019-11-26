# UpdateEmailDefinitionRequest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**name** | **string** | Name of the definition. Must be unique. | [optional] 
**content** | [**\SalesForce\MarketingCloud\Model\EmailDefinitionContent**](EmailDefinitionContent.md) |  | [optional] 
**status** | **string** | Operational state of the definition: active, inactive, or deleted. A message sent to an active definition is processed and delivered. A message sent to an inactive definition isn’t processed or delivered. Instead, the message is queued for later processing for up to three days. | [optional] 
**description** | **string** | User-provided description of the email definition. | [optional] 
**classification** | **string** | Marketing Cloud external key of a sending classification defined in Email Studio Administration. Only transactional classifications are permitted. Default is default transactional. | [optional] 
**subscriptions** | [**\SalesForce\MarketingCloud\Model\EmailDefinitionSubscriptions**](EmailDefinitionSubscriptions.md) |  | [optional] 
**options** | [**\SalesForce\MarketingCloud\Model\EmailDefinitionOptions**](EmailDefinitionOptions.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


