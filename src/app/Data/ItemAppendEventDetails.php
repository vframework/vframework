<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Data;

/**
 * @property string $key
 * @property string $content
 */
class ItemAppendEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $key
     * @param string $content
     */
    public function __construct(string $key, string $content)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('content', [
                    'type' => 'string'
                ])
        ;
        $this->key = $key;
        $this->content = $content;
    }

}
