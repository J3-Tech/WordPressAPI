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

    protected function makeApiCall(array $body)
    {
        $this->client->request('POST', $this->getUri(), $body);
        $content = $this->client->getResponse()->getContent();

        return unserialize($content);
    }

    public function author($name)
    {
        $arguments = [
            'author' => $name,
        ];
        $body = [
            'action' => $this->getAction('query'),
            'request' => serialize((object) $arguments),
        ];

        return $this->makeApiCall($body);
    }

    public function browse($type)
    {
        $arguments = [
            'browse' => $type,
        ];
        $body = [
            'action' => $this->getAction('query'),
            'request' => serialize((object) $arguments),
        ];

        return $this->makeApiCall($body);
    }

    public function search($keywords)
    {
        $arguments = [
            'search' => $keywords,
        ];
        $body = [
            'action' => $this->getAction('query'),
            'request' => serialize((object) $arguments),
        ];

        return $this->makeApiCall($body);
    }

    public function slug($slug)
    {
        echo $this->getAction('information');
        $arguments = [
            'slug' => $slug,
        ];
        $body = [
            'action' => $this->getAction('information'),
            'request' => serialize((object) $arguments),
        ];

        return $this->makeApiCall($body);
    }

    public function tag($tag)
    {
        $arguments = [
            'tag' => $tag,
        ];
        $body = [
            'action' => $this->getAction('query'),
            'request' => serialize((object) $arguments),
        ];

        return $this->makeApiCall($body);
    }

    public function getAction($type)
    {
        if ($type == 'information') {
            return rtrim($this->getType(), 's')."_{$type}";
        }

        return "{$type}_{$this->getType()}";
    }

    public function getUri()
    {
        return "http://api.wordpress.org/{$this->getType()}/info/1.0/";
    }

    abstract protected function getType();
}
