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
 * @property bool $exists
 */
class ItemExistsEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * @param string $key
     * @param bool $exists
     */
    public function __construct(string $key, bool $exists)
    {
        $this
                ->defineProperty('key', [
                    'type' => 'string'
                ])
                ->defineProperty('exists', [
                    'type' => 'bool'
                ])
        ;
        $this->key = $key;
        $this->exists = $exists;
    }

}
