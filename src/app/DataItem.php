<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * A data item.
 * 
 * @property string|null $key The key of the data item.
 * @property string|null $value The value of the data item.
 * @property \VFramework\DataObject $metadata The metadata of the data item.
 */
class DataItem
{

    use \Duzhenye\DataObjectTrait;
    use \Duzhenye\DataObjectToArrayTrait;
    use \Duzhenye\DataObjectToJSONTrait;

    public function __construct()
    {
        $this
                ->defineProperty('key', [
                    'type' => '?string'
                ])
                ->defineProperty('value', [
                    'type' => '?string'
                ])
                ->defineProperty('metadata', [
                    'type' => '\VFramework\DataObject'
                ])
        ;
    }

}
