<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

use VFramework\App;

/**
 * Response object.
 * 
 * @property string $content The content of the response.
 * @property int|null $statusCode The response status code.
 * @property string $charset The response character set.
 * @property-read \VFramework\App\Response\Headers $headers The response headers.
 * @property-read \VFramework\App\Response\Cookies $cookies The response cookies.
 */
class Response
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $content The content of the response.
     */
    public function __construct(string $content = '')
    {
        $this->content = $content;

        $this
                ->defineProperty('content', [
                    'type' => 'string'
                ])
                ->defineProperty('statusCode', [
                    'type' => '?int',
                    'init' => function() {
                        return 200;
                    },
                    'unset' => function() {
                        return null;
                    }
                ])
                ->defineProperty('charset', [
                    'type' => '?string'
                ])
                ->defineProperty('headers', [
                    'init' => function() {
                        return new App\Response\Headers();
                    },
                    'readonly' => true
                ])
                ->defineProperty('cookies', [
                    'init' => function() {
                        return new App\Response\Cookies();
                    },
                    'readonly' => true
                ])
        ;
    }

}
