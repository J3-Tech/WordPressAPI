<?php

namespace WPApi\Tests;

use WPApi\WPApi;

class PluginTest extends \PHPUnit_Framework_TestCase
{
    protected $plugin;

    public function testAuthor()
    {
        $response = $this->plugin->author('Ryuhei Yokokawa');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testBrowse()
    {
        $response = $this->plugin->browse('new');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testSearch()
    {
        $response = $this->plugin->search('wordpress seo');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testSlug()
    {
        $response = $this->plugin->slug('wordpress-seo');
        $this->assertInstanceOf('WPApi\\Model\\Plugin', $response);
    }

    public function testTag()
    {
        $response = $this->plugin->tag('seo');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function setup()
    {
        $this->plugin = WPApi::plugin();
    }
}