<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Response;

/**
 * Response type that makes temporary redirect.
 */
class TemporaryRedirect extends \VFramework\App\Response
{

    /**
     * 
     * @param string $url The redirect URL.
     */
    public function __construct(string $url)
    {
        parent::__construct('');
        $this->statusCode = 307;
        $this->headers
                ->set($this->headers->make('Content-Type', 'text/plain'))
                ->set($this->headers->make('Location', $url));
    }

}
