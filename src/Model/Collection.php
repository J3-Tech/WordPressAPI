<?php

namespace WPApi\Model;

class Collection
{
    private $items = array();

    public function add($item)
    {
        $this->items[] = $item;
    }
}
