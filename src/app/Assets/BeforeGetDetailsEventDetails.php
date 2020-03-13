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
 * @property array $list
 * @property ?array $returnValue
 */
class BeforeGetDetailsEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $filename
     * @param array $list
     */
    public function __construct(string $filename, array $list)
    {
        $this
                ->defineProperty('filename', [
                    'type' => 'string'
                ])
                ->defineProperty('list', [
                    'type' => 'array'
                ])
                ->defineProperty('returnValue', [
                    'type' => '?array'
                ])
        ;
        $this->filename = $filename;
        $this->list = $list;
    }

}
