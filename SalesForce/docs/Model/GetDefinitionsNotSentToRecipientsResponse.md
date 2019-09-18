# GetDefinitionsNotSentToRecipientsResponse

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**lastEventID** | **int** | Event ID from which you want the response to start. To obtain the initial event ID, submit a request without a lastEventId. The events in the response are listed top to bottom from oldest to newest | [optional] 
**messages** | [**\SalesForce\MarketingCloud\Model\GetDefinitionsNotSentToRecipientsMessage[]**](GetDefinitionsNotSentToRecipientsMessage.md) |  | [optional] 
**count** | **int** | Number of pages | [optional] 
**requestId** | **string** | The ID of the request | [optional] 
**pageSize** | **int** | Number of definitions, which are array elements, to return per paged response. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


