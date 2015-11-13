<?php

namespace WPApi\Tests;

use WPApi\WPApi;

class ThemeTest extends \PHPUnit_Framework_TestCase
{
    protected $theme;

    public function testAuthor()
    {
        $response = $this->theme->author('fontethemes');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testBrowse()
    {
        $response = $this->theme->browse('new');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testSearch()
    {
        $response = $this->theme->search('simple');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function testSlug()
    {
        $response = $this->theme->slug('simpler');
        $this->assertInstanceOf('WPApi\\Model\\Theme', $response);
    }

    public function testTag()
    {
        $response = $this->theme->tag('simple');
        $this->assertInstanceOf('WPApi\\Model\\Collection', $response);
    }

    public function setup()
    {
        $this->theme = WPApi::theme();
    }
}