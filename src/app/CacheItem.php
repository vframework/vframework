<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * @property string|null $key The key of the cache item.
 * @property mixed $value The value of the cache item.
 * @property int|null $ttl Time in seconds to stay in the cache.
 */
class CacheItem
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
                ->defineProperty('value')
                ->defineProperty('ttl', [
                    'type' => '?int'
                ])
        ;
    }

}
