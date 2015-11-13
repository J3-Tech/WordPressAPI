<?php

namespace WPApi;

use WPApi\Model\Theme as ThemeModel;

class Theme extends AbstractApiCall
{
    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return 'themes';
    }

    /**
     * {@inheritdoc}
     */
    protected function createModel()
    {
        return new ThemeModel();
    }
}
