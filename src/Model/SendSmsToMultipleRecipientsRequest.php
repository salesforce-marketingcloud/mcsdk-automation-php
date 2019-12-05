<?php
/**
 * SendSmsToMultipleRecipientsRequest
 *
 * PHP version 5
 *
 * @category Class
 * @package  SalesForce\MarketingCloud
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * Marketing Cloud REST API
 *
 * Marketing Cloud's REST API is our newest API. It supports multi-channel use cases, is much more lightweight and easy to use than our SOAP API, and is getting more comprehensive with every release.
 *
 * OpenAPI spec version: 1.1.0
 * Contact: mc_sdk@salesforce.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.8
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace SalesForce\MarketingCloud\Model;

use \ArrayAccess;
use \SalesForce\MarketingCloud\ObjectSerializer;

/**
 * SendSmsToMultipleRecipientsRequest Class Doc Comment
 *
 * @category Class
 * @package  SalesForce\MarketingCloud
 * @author   Swagger Codegen team
 * @link     https://github.com/swagger-api/swagger-codegen
 */
class SendSmsToMultipleRecipientsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SendSmsToMultipleRecipientsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'definitionKey' => 'string',
        'recipients' => '\SalesForce\MarketingCloud\Model\Recipient[]',
        'subscriptions' => '\SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsSubscriptionsRequest',
        'content' => '\SalesForce\MarketingCloud\Model\SendSmsContentRequest',
        'attributes' => '\SalesForce\MarketingCloud\Model\Attributes'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'definitionKey' => null,
        'recipients' => null,
        'subscriptions' => null,
        'content' => null,
        'attributes' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'definitionKey' => 'definitionKey',
        'recipients' => 'recipients',
        'subscriptions' => 'subscriptions',
        'content' => 'content',
        'attributes' => 'attributes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'definitionKey' => 'setDefinitionKey',
        'recipients' => 'setRecipients',
        'subscriptions' => 'setSubscriptions',
        'content' => 'setContent',
        'attributes' => 'setAttributes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'definitionKey' => 'getDefinitionKey',
        'recipients' => 'getRecipients',
        'subscriptions' => 'getSubscriptions',
        'content' => 'getContent',
        'attributes' => 'getAttributes'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['definitionKey'] = isset($data['definitionKey']) ? $data['definitionKey'] : null;
        $this->container['recipients'] = isset($data['recipients']) ? $data['recipients'] : null;
        $this->container['subscriptions'] = isset($data['subscriptions']) ? $data['subscriptions'] : null;
        $this->container['content'] = isset($data['content']) ? $data['content'] : null;
        $this->container['attributes'] = isset($data['attributes']) ? $data['attributes'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['definitionKey'] === null) {
            $invalidProperties[] = "'definitionKey' can't be null";
        }
        if ($this->container['recipients'] === null) {
            $invalidProperties[] = "'recipients' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets definitionKey
     *
     * @return string
     */
    public function getDefinitionKey()
    {
        return $this->container['definitionKey'];
    }

    /**
     * Sets definitionKey
     *
     * @param string $definitionKey Unique, user-generated key to access the definition object.
     *
     * @return $this
     */
    public function setDefinitionKey($definitionKey)
    {
        $this->container['definitionKey'] = $definitionKey;

        return $this;
    }

    /**
     * Gets recipients
     *
     * @return \SalesForce\MarketingCloud\Model\Recipient[]
     */
    public function getRecipients()
    {
        return $this->container['recipients'];
    }

    /**
     * Sets recipients
     *
     * @param \SalesForce\MarketingCloud\Model\Recipient[] $recipients Array of recipient objects that contain parameters and metadata for the recipients, such as send tracking and personalization attributes. Use this parameter to send to multiple recipients in one request. Use either the recipient or recipients parameter, but not both.
     *
     * @return $this
     */
    public function setRecipients($recipients)
    {
        $this->container['recipients'] = $recipients;

        return $this;
    }

    /**
     * Gets subscriptions
     *
     * @return \SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsSubscriptionsRequest
     */
    public function getSubscriptions()
    {
        return $this->container['subscriptions'];
    }

    /**
     * Sets subscriptions
     *
     * @param \SalesForce\MarketingCloud\Model\SendSmsToMultipleRecipientsSubscriptionsRequest $subscriptions subscriptions
     *
     * @return $this
     */
    public function setSubscriptions($subscriptions)
    {
        $this->container['subscriptions'] = $subscriptions;

        return $this;
    }

    /**
     * Gets content
     *
     * @return \SalesForce\MarketingCloud\Model\SendSmsContentRequest
     */
    public function getContent()
    {
        return $this->container['content'];
    }

    /**
     * Sets content
     *
     * @param \SalesForce\MarketingCloud\Model\SendSmsContentRequest $content content
     *
     * @return $this
     */
    public function setContent($content)
    {
        $this->container['content'] = $content;

        return $this;
    }

    /**
     * Gets attributes
     *
     * @return \SalesForce\MarketingCloud\Model\Attributes
     */
    public function getAttributes()
    {
        return $this->container['attributes'];
    }

    /**
     * Sets attributes
     *
     * @param \SalesForce\MarketingCloud\Model\Attributes $attributes attributes
     *
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->container['attributes'] = $attributes;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


