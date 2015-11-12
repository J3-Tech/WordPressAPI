<?php

namespace WPApi\Interfaces;

interface ApiInterface
{
    public function slug($slug);
    public function browse($type);
    public function author($name);
    public function tag($tag);
    public function search($keywords);
}
