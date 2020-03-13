<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Request;

/**
 * @property string|null $name The name of the form data item.
 * @property string|null $value The value of the form data item.
 */
class FormDataItem
{

    use \Duzhenye\DataObjectTrait;
    use \Duzhenye\DataObjectToArrayTrait;
    use \Duzhenye\DataObjectToJSONTrait;

    public function __construct()
    {
        $this
                ->defineProperty('name', [
                    'type' => '?string'
                ])
                ->defineProperty('value', [
                    'type' => '?string'
                ])
        ;
    }

}
