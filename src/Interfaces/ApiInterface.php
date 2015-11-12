<?php

namespace WPApi\Interfaces;

interface ApiInterface
{
    /**
     * The author's WordPress username, to retrieve objects by a particular author.
     *
     * @param string $name author name
     *
     * @return mixed
     */
    public function author($name);

    /**
     * Browse objects.
     *
     * @param string $type featured|popular|new
     *
     * @return mixed
     */
    public function browse($type);

    /**
     * A search term, with which to search the repository.
     *
     * @param string $keywords
     *
     * @return mixed
     */
    public function search($keywords);

    /**
     * The slug of the object to return the data for.
     *
     * @param string $slug
     *
     * @return mixed
     */
    public function slug($slug);

    /**
     * Tag with which to retrieve objects for.
     *
     * @param string $tag
     *
     * @return mixed
     */
    public function tag($tag);
}
