# Asset

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **float** | The id of the asset | [optional] 
**customerKey** | **string** | Reference to customer&#39;s private ID/name for the asset | 
**contentType** | **string** | The type that the content attribute will be in | [optional] 
**data** | **object** | Property bag containing the asset data | [optional] 
**assetType** | [**\SalesForce\MarketingCloud\Model\AssetType**](AssetType.md) |  | 
**version** | **float** | The version of the asset | [optional] 
**locked** | **bool** | Specifies if the asset can be modified or not | [optional] 
**fileProperties** | **object** | Stores the different properties that this asset refers to if it is a file type | [optional] 
**name** | **string** | Name of the asset, set by the client | 
**description** | **string** | Description of the asset, set by the client | 
**category** | **object** | ID of the category the asset belongs to | [optional] 
**tags** | **string[]** | List of tags associated with the asset | [optional] 
**content** | **string** | The actual content of the asset | [optional] 
**design** | **string** | Fallback for display when neither content nor supercontent are provided | [optional] 
**superContent** | **string** | Content that supersedes content in terms of display | [optional] 
**customFields** | **object** | Custom fields within an asset | [optional] 
**views** | **object** | Views within an asset | [optional] 
**blocks** | **object** | Blocks within the asset | [optional] 
**minBlocks** | **float** | Minimum number of blocks within an asset | [optional] 
**maxBlocks** | **float** | Maximum number of blocks within an asset | [optional] 
**channels** | **object** | List of channels that are allowed to use this asset | [optional] 
**allowedBlocks** | **string[]** | List of blocks that are allowed in the asset | [optional] 
**slots** | **object** | Slots within the asset | [optional] 
**businessUnitAvailability** | **object** | A dictionary of member IDs that have been granted access to the asset | [optional] 
**sharingProperties** | [**\SalesForce\MarketingCloud\Model\SharingProperties**](SharingProperties.md) |  | [optional] 
**template** | **object** | Template the asset follows | [optional] 
**file** | **string** | Base64-encoded string of a file associated with an asset | [optional] 
**generateFrom** | **string** | Tells the sending compiler what view to use for generating this view&#39;s content | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


