<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework;

/**
 * @property-read string $id The id of the addon.
 * @property-read string $dir The directory where the addon files are located.
 * @property-read array $options The addon options. Available values:
 *     - require - An array containing the ids of addons that must be added before this one.
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
     * @param array $options
     */
    public function __construct(string $id, string $dir, array $options)
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
                ->defineProperty('options', [
                    'type' => 'array',
                    'get' => function() use ($options) {
                        return $options;
                    },
                    'readonly' => true
                ])
        ;
    }

}
