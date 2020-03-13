<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework;

/**
 * 
 */
class DataObject implements \ArrayAccess
{

    use \Duzhenye\DataObjectTrait;
    use \Duzhenye\DataObjectArrayAccessTrait;
    use \Duzhenye\DataObjectToArrayTrait;
    use \Duzhenye\DataObjectFromArrayTrait;
    use \Duzhenye\DataObjectToJSONTrait;
    use \Duzhenye\DataObjectFromJSONTrait;
}
