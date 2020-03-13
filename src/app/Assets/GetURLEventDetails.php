<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Assets;

/**
 * @property string $filename
 * @property array $options
 * @property string|null $url
 */
class GetURLEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $filename
     * @param array $options
     * @param string|null $url
     */
    public function __construct(string $filename, array $options, string $url = null)
    {
        $this
                ->defineProperty('filename', [
                    'type' => 'string'
                ])
                ->defineProperty('options', [
                    'type' => 'array'
                ])
                ->defineProperty('url', [
                    'type' => '?string'
                ])
        ;
        $this->filename = $filename;
        $this->options = $options;
        $this->url = $url;
    }

}
