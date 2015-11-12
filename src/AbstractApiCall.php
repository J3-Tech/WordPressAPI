<?php

namespace WPApi;

use Goutte\Client;
use WPApi\Interfaces\ApiInterface;

abstract class AbstractApiCall implements ApiInterface
{
    /**
     * Goutte Client.
     *
     * @var Client
     */
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function author($name)
    {
        return $this->makeApiCall('query',[
            'author' => $name
        ]);
    }

    public function browse($type)
    {
        return $this->makeApiCall('query',[
            'browse' => $type
        ]);
    }

    public function search($keywords)
    {
        return $this->makeApiCall('query',[
            'search' => $keywords
        ]);
    }

    public function slug($slug)
    {
        return $this->makeApiCall('information', [
            'slug' => $slug
        ]);
    }

    public function tag($tag)
    {
        return $this->makeApiCall('query',[
            'tag' => $tag
        ]);
    }

    protected function makeApiCall($type, array $arguments)
    {
        $body = [
            'action' => $this->getAction($type),
            'request' => serialize((object) $arguments),
        ];
        $this->client->request('POST', $this->getUri(), $body);
        $content = $this->client->getResponse()->getContent();

        return unserialize($content);
    }

    protected function getAction($type)
    {
        if ($type == 'information') {
            return rtrim($this->getType(), 's')."_{$type}";
        }

        return "{$type}_{$this->getType()}";
    }

    protected function getUri()
    {
        return "http://api.wordpress.org/{$this->getType()}/info/1.0/";
    }

    abstract protected function getType();
}
