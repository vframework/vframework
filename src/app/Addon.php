<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * @property-read string $id The id of the addon.
 * @property-read string $dir The directory where the addon files are located.
 */
class Addon
{

    use \Duzhenye\DataObjectTrait;
    use \Duzhenye\DataObjectToArrayTrait;
    use \Duzhenye\DataObjectToJSONTrait;

    /**
     * 
     * @param string $id
     * @param string $dir
     */
    public function __construct(string $id, string $dir)
    {
        $this
                ->defineProperty('id', [
                    'type' => 'string',
                    'get' => function() use ($id) {
                        return $id;
                    },
                    'readonly' => true
                ])
                ->defineProperty('dir', [
                    'type' => 'string',
                    'get' => function() use ($dir) {
                        return $dir;
                    },
                    'readonly' => true
                ])
        ;
    }

}
