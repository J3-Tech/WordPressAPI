<?php

namespace WPApi;

class Theme extends AbstractApiCall
{
    /**
     * {@inheritdoc}
     */
    protected function getType()
    {
        return 'themes';
    }
}
