<?php

namespace WPApi;

use Goutte\Client;
use WPApi\Interfaces\ApiInterface;
use AutoMapper\AutoMapper;
use WPApi\Model\Theme as ThemeModel;
use WPApi\Model\Collection;

abstract class AbstractApiCall implements ApiInterface
{
    /**
     * Goutte Client.
     *
     * @var Client
     */
    protected $client;

    protected $automapper;

    public function __construct()
    {
        $this->client = new Client();
        $this->automapper = new AutoMapper();
    }

    /**
     * {@inheritdoc}
     */
    public function author($name)
    {
        return $this->makeApiCall('query', [
            'author' => $name,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function browse($type)
    {
        return $this->makeApiCall('query', [
            'browse' => $type,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function search($keywords)
    {
        return $this->makeApiCall('query', [
            'search' => $keywords,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function slug($slug)
    {
        return $this->makeApiCall('information', [
            'slug' => $slug,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function tag($tag)
    {
        return $this->makeApiCall('query', [
            'tag' => $tag,
        ]);
    }

    /**
     * make the actual API call.
     *
     * @param string $type      information or query
     * @param array  $arguments arguments to query
     *
     * @return mixed
     */
    protected function makeApiCall($type, array $arguments)
    {
        $body = [
            'action' => $this->getAction($type),
            'request' => serialize((object) $arguments),
        ];
        $this->client->request('POST', $this->getUri(), $body);
        $content = $this->client->getResponse()->getContent();

        return $this->mapResponse(unserialize($content));
    }

    protected function mapResponseToCollection(\stdClass $response)
    {
        $type = $this->getType();
        if(!property_exists($response, $type)){
            throw new \Exception("Property {$type} does not exist.");
        }
        $collection = new Collection();
        foreach ($response->$type as $key => $value) {
            $model = $this->mapResponseToModel($value);
            $collection->add($model);
        }

        return $collection;
    }

    protected function mapResponseToModel(\stdClass $response)
    {
        $model = $this->createModel();
        print_r($response);
        $this->automapper->map($response, $model);

        return $model;
    }

    protected function mapResponse(\stdClass $response)
    {
        try{
            return $this->mapResponseToCollection($response);
        }catch(\Exception $e){
            return $this->mapResponseToModel($response);
        }
    }

    /**
     * get API action.
     *
     * @param string $type
     *
     * @return string formatted action
     */
    protected function getAction($type)
    {
        if ($type == 'information') {
            return rtrim($this->getType(), 's')."_{$type}";
        }

        return "{$type}_{$this->getType()}";
    }

    /**
     * get URI of API.
     *
     * @return string
     */
    protected function getUri()
    {
        return "http://api.wordpress.org/{$this->getType()}/info/1.0/";
    }

    /**
     * get the type of object to query.
     *
     * @return string
     */
    abstract protected function getType();

    /**
     * create model
     * @return mixed
     */
    abstract protected function createModel();
}
