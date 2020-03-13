<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework;

/**
 * Base class for lists.
 */
class DataList implements \ArrayAccess, \Iterator, \Countable
{

    use \Duzhenye\DataListTrait;
    use \Duzhenye\DataListArrayAccessTrait;
    use \Duzhenye\DataListIteratorTrait;
    use \Duzhenye\DataListToArrayTrait;
    use \Duzhenye\DataListToJSONTrait;

    /**
     * Constructs a new data list.
     * 
     * @param array|iterable|callback $dataSource
     * @throws \InvalidArgumentException
     */
    public function __construct($dataSource = null)
    {
        $this->registerDataListClass('Duzhenye\DataListContext', 'VFramework\DataList\Context');
        $this->registerDataListClass('Duzhenye\DataListFilterByAction', 'VFramework\DataList\FilterByAction');
        $this->registerDataListClass('Duzhenye\DataListSortByAction', 'VFramework\DataList\SortByAction');
        $this->registerDataListClass('Duzhenye\DataListAction', 'VFramework\DataList\Action');
        $this->registerDataListClass('Duzhenye\DataListSliceAction', 'VFramework\DataList\SliceAction');
        $this->registerDataListClass('Duzhenye\DataListSlicePropertiesAction', 'VFramework\DataList\SlicePropertiesAction');
        $this->registerDataListClass('Duzhenye\DataListObject', 'VFramework\DataObject');
        if ($dataSource !== null) {
            $this->setDataSource($dataSource);
        }
    }

}
