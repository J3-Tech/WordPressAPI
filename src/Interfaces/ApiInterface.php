<?php

namespace WPApi\Interfaces;

interface ApiInterface
{
    public function author($name);
    public function browse($type);
    public function search($keywords);
    public function slug($slug);
    public function tag($tag);
}
