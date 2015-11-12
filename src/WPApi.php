<?php

namespace WPApi;

class WPApi
{
	private static $plugin;
	private static $theme;

    public static function plugin()
    {
    	if(!self::$plugin){
    		self::$plugin = new Plugin();
    	}

    	return self::$plugin;
    }

    public static function theme()
    {
    	if(!self::$theme){
    		self::$theme = new Theme();
    	}

    	return self::$theme;
    }
}
