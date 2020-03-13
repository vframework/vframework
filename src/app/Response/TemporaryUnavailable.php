<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Response;

/**
 * Response type that sends Temporary Unavailable status.
 */
class TemporaryUnavailable extends \VFramework\App\Response
{

    /**
     * 
     * @param string $content The content of the response.
     */
    public function __construct(string $content = '')
    {
        parent::__construct($content);
        $this->statusCode = 503;
        $this->charset = 'UTF-8';
        $this->headers->set($this->headers->make('Content-Type', 'text/plain'));
    }

}
