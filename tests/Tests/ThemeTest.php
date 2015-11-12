<?php

namespace WPApi\Tests;

use WPApi\Theme;

class ThemeTest extends \PHPUnit_Framework_TestCase
{
    protected $theme;

    public function testAuthor()
    {
        $response = $this->theme->author('fontethemes');
        $this->assertInstanceOf('stdClass', $response);
    }

    public function testSearch()
    {
        $response = $this->theme->search('simple');
        $this->assertInstanceOf('stdClass', $response);
    }

    public function testSlug()
    {
        $response = $this->theme->slug('simpler');
        $this->assertInstanceOf('stdClass', $response);
    }

    public function setup()
    {
        $this->theme = new Theme();
    }
}