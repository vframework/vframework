<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * URLs utilities.
 */
class URLs
{

    /**
     *
     * @var string
     */
    private $base = null;

    /**
     * 
     * @param \VFramework\App $app
     */
    public function __construct(\VFramework\App $app)
    {
        $this->base = $app->request->base;
    }

    /**
     * Constructs an URL for the path specified.
     * 
     * @param string $path The path to use (will be encoded).
     * @return string Absolute URL containing the base URL plus the path given.
     */
    public function get(string $path = '/')
    {
        return $this->base . implode('/', array_map('urlencode', explode('/', $path)));
    }
}
