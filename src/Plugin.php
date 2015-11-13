<?php

namespace WPApi;

use WPApi\Model\Plugin as PluginModel;

class Plugin extends AbstractApiCall
{
    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return 'plugins';
    }

    /**
     * {@inheritdoc}
     */
    protected function createModel()
    {
    	return new PluginModel();
    }
}
