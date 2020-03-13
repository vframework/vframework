<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * @property \VFramework\App\Response $response
 */
class SendResponseEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param \VFramework\App\Response $response
     */
    public function __construct(\VFramework\App\Response $response)
    {
        $this
                ->defineProperty('response', [
                    'type' => \VFramework\App\Response::class
                ])
        ;
        $this->response = $response;
    }

}
