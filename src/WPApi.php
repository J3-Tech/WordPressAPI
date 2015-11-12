<?php

namespace WPApi;

class WPApi
{
    /**
     * Plugin instance.
     *
     * @var Plugin
     */
    private static $plugin;

    /**
     * Theme instance.
     *
     * @var Theme
     */
    private static $theme;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    /**
     * create plugin instance.
     *
     * @return Plugin
     */
    public static function plugin()
    {
        if (!self::$plugin) {
            self::$plugin = new Plugin();
        }

        return self::$plugin;
    }

    /**
     * create theme instance.
     *
     * @return Theme
     */
    public static function theme()
    {
        if (!self::$theme) {
            self::$theme = new Theme();
        }

        return self::$theme;
    }
}
