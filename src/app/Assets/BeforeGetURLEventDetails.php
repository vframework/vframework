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
 * @property ?string $returnValue
 */
class BeforeGetURLEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $filename
     * @param array $options
     */
    public function __construct(string $filename, array $options)
    {
        $this
                ->defineProperty('filename', [
                    'type' => 'string'
                ])
                ->defineProperty('options', [
                    'type' => 'array'
                ])
                ->defineProperty('returnValue', [
                    'type' => '?string'
                ])
        ;
        $this->filename = $filename;
        $this->options = $options;
    }

}
