# GetDefinitionSendStatusForRecipientResponseInfo

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**messageKey** | **string** | Unique identifier used to track message status. | [optional] 
**contactKey** | **string** | Unique identifier for a subscriber in Marketing Cloud. Each request must include a contactKey. You can use an existing subscriber key or create one at send time by using the recipient’s email address. | [optional] 
**to** | **string** | Channel address of the recipient. For email, it’s the recipient&#39;s email address. | [optional] 
**statusCode** | **float** | The specific status code | [optional] 
**statusMessage** | **string** | The specific status message | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


