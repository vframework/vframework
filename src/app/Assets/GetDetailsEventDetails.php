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
class GetDetailsEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $filename
     * @param array $list
     * @param array $returnValue
     */
    public function __construct(string $filename, array $list, array $returnValue)
    {
        $this
                ->defineProperty('filename', [
                    'type' => 'string'
                ])
                ->defineProperty('list', [
                    'type' => 'array'
                ])
                ->defineProperty('returnValue', [
                    'type' => 'array'
                ])
        ;
        $this->filename = $filename;
        $this->list = $list;
        $this->returnValue = $returnValue;
    }

}
