<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Data;

/**
 * @property \VFramework\DataList $list
 */
class GetListEventDetails
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param \VFramework\DataList $list
     */
    public function __construct(\VFramework\DataList $list)
    {
        $this
                ->defineProperty('list', [
                    'type' => '\VFramework\DataList'
                ])
        ;
        $this->list = $list;
    }

}
