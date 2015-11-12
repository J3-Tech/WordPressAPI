<?php

namespace WPApi;

class Plugin extends AbstractApiCall
{
    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return 'plugins';
    }
}
