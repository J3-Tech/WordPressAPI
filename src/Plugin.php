<?php

namespace WPApi;

class Plugin extends AbstractApiCall
{
    protected function getType()
    {
        return 'plugins';
    }
}
