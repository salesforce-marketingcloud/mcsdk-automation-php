<?php

namespace SalesForce\MarketingCloud\Event\Subscriber;

use SalesForce\MarketingCloud\Configuration;
use SalesForce\MarketingCloud\Event\AuthSuccessEvent;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class AuthEventSub
 *
 * @package SalesForce\MarketingCloud\Event\Subscriber
 */
class AuthEventSub implements EventSubscriberInterface
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * AuthEventSub constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * ['eventName' => 'methodName']
     *  * ['eventName' => ['methodName', $priority]]
     *  * ['eventName' => [['methodName1', $priority], ['methodName2']]]
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            AuthSuccessEvent::NAME => "onAuthSuccess"
        ];
    }

    /**
     * Handles the success event of the authentication
     *
     * @param AuthSuccessEvent $event
     */
    public function onAuthSuccess(AuthSuccessEvent $event)
    {
        $this->configuration->setHost($event->getRestInstanceUrl());
        $this->configuration->setAccessToken($event->getAccessToken());
    }
}