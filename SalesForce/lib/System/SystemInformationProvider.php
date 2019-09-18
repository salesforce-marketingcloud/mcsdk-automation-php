<?php

namespace SalesForce\MarketingCloud\System;

/**
 * Class SystemInformationProvider
 *
 * @package SalesForce\MarketingCloud\System
 */
class SystemInformationProvider
{
    /**
     * Returns the PHP version
     *
     * @return string
     */
    public static function getPhpVersion(): string
    {
        return rtrim(PHP_VERSION, PHP_EXTRA_VERSION);
    }

    /**
     * Returns the operating system family
     *
     * @return string
     */
    public static function getOsFamily(): string
    {
        return PHP_OS_FAMILY;
    }

    /**
     * Returns the operating system version
     *
     * @return string
     */
    public static function getOsVersion(): string
    {
        if (static::getOsFamily() === "Windows") {
            return PHP_WINDOWS_VERSION_MAJOR . "." . PHP_WINDOWS_VERSION_MINOR;
        }

        return ltrim(PHP_EXTRA_VERSION, "-");
    }

    /**
     * Returns the name of the operating system along with the version
     *
     * @return string
     */
    public static function getOsDescription(): string
    {
        return static::getOsFamily() . "/" . static::getOsVersion();
    }
}
