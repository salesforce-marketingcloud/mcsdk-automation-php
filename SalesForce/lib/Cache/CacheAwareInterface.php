<?php

namespace SalesForce\MarketingCloud\Cache;

use Psr\Cache\CacheItemPoolInterface;

/**
 * Interface CacheAwareInterface
 *
 * @package SalesForce\MarketingCloud\Cache
 */
interface CacheAwareInterface
{
    /**
     * @param CacheItemPoolInterface $cache
     * @return mixed
     */
    public function setCache(CacheItemPoolInterface $cache);
}