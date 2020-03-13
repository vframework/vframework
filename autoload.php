<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

$classes = [
    'VFramework' => 'src/VFramework.php',
    'VFramework\App\Addon' => 'src/App/Addon.php',
    'VFramework\App\Addons' => 'src/App/Addons.php',
    'VFramework\App\Assets' => 'src/App/Assets.php',
    'VFramework\App\Assets\BeforeGetDetailsEventDetails' => 'src/App/Assets/BeforeGetDetailsEventDetails.php',
    'VFramework\App\Assets\BeforeGetURLEventDetails' => 'src/App/Assets/BeforeGetURLEventDetails.php',
    'VFramework\App\Assets\BeforePrepareEventDetails' => 'src/App/Assets/BeforePrepareEventDetails.php',
    'VFramework\App\Assets\GetDetailsEventDetails' => 'src/App/Assets/GetDetailsEventDetails.php',
    'VFramework\App\Assets\GetURLEventDetails' => 'src/App/Assets/GetURLEventDetails.php',
    'VFramework\App\Assets\PrepareEventDetails' => 'src/App/Assets/PrepareEventDetails.php',
    'VFramework\App\BeforeSendResponseEventDetails' => 'src/App/BeforeSendResponseEventDetails.php',
    'VFramework\App\CacheItem' => 'src/App/CacheItem.php',
    'VFramework\App\CacheRepository' => 'src/App/CacheRepository.php',
    'VFramework\App\Cache\ItemChangeEventDetails' => 'src/App/Cache/ItemChangeEventDetails.php',
    'VFramework\App\Cache\ItemDeleteEventDetails' => 'src/App/Cache/ItemDeleteEventDetails.php',
    'VFramework\App\Cache\ItemExistsEventDetails' => 'src/App/Cache/ItemExistsEventDetails.php',
    'VFramework\App\Cache\ItemGetEventDetails' => 'src/App/Cache/ItemGetEventDetails.php',
    'VFramework\App\Cache\ItemGetValueEventDetails' => 'src/App/Cache/ItemGetValueEventDetails.php',
    'VFramework\App\Cache\ItemRequestEventDetails' => 'src/App/Cache/ItemRequestEventDetails.php',
    'VFramework\App\Cache\ItemSetEventDetails' => 'src/App/Cache/ItemSetEventDetails.php',
    'VFramework\App\Classes' => 'src/App/Classes.php',
    'VFramework\App\Config' => 'src/App/Config.php',
    'VFramework\App\Context' => 'src/App/Context.php',
    'VFramework\App\Context\Assets' => 'src/App/Context/Assets.php',
    'VFramework\App\Context\Classes' => 'src/App/Context/Classes.php',
    'VFramework\App\Contexts' => 'src/App/Contexts.php',
    'VFramework\App\Data\DataLockedException' => 'src/App/Data/DataLockedException.php',
    'VFramework\App\Data\GetListEventDetails' => 'src/App/Data/GetListEventDetails.php',
    'VFramework\App\Data\ItemAppendEventDetails' => 'src/App/Data/ItemAppendEventDetails.php',
    'VFramework\App\Data\ItemChangeEventDetails' => 'src/App/Data/ItemChangeEventDetails.php',
    'VFramework\App\Data\ItemDeleteEventDetails' => 'src/App/Data/ItemDeleteEventDetails.php',
    'VFramework\App\Data\ItemDeleteMetadataEventDetails' => 'src/App/Data/ItemDeleteMetadataEventDetails.php',
    'VFramework\App\Data\ItemDuplicateEventDetails' => 'src/App/Data/ItemDuplicateEventDetails.php',
    'VFramework\App\Data\ItemExistsEventDetails' => 'src/App/Data/ItemExistsEventDetails.php',
    'VFramework\App\Data\ItemGetEventDetails' => 'src/App/Data/ItemGetEventDetails.php',
    'VFramework\App\Data\ItemGetMetadataEventDetails' => 'src/App/Data/ItemGetMetadataEventDetails.php',
    'VFramework\App\Data\ItemGetValueEventDetails' => 'src/App/Data/ItemGetValueEventDetails.php',
    'VFramework\App\Data\ItemRenameEventDetails' => 'src/App/Data/ItemRenameEventDetails.php',
    'VFramework\App\Data\ItemRequestEventDetails' => 'src/App/Data/ItemRequestEventDetails.php',
    'VFramework\App\Data\ItemSetEventDetails' => 'src/App/Data/ItemSetEventDetails.php',
    'VFramework\App\Data\ItemSetMetadataEventDetails' => 'src/App/Data/ItemSetMetadataEventDetails.php',
    'VFramework\App\Data\ItemSetValueEventDetails' => 'src/App/Data/ItemSetValueEventDetails.php',
    'VFramework\App\DataCacheDriver' => 'src/App/DataCacheDriver.php',
    'VFramework\App\DataItem' => 'src/App/DataItem.php',
    'VFramework\App\DataRepository' => 'src/App/DataRepository.php',
    'VFramework\EventsTrait' => 'src/EventsTrait.php',
    'VFramework\App\FileDataDriver' => 'src/App/FileDataDriver.php',
    'VFramework\App\FileDataItemStreamWrapper' => 'src/App/FileDataItemStreamWrapper.php',
    'VFramework\App\FileLogger' => 'src/App/FileLogger.php',
    'VFramework\App\ICacheDriver' => 'src/App/ICacheDriver.php',
    'VFramework\App\IDataDriver' => 'src/App/IDataDriver.php',
    'VFramework\App\IDataItemStreamWrapper' => 'src/App/IDataItemStreamWrapper.php',
    'VFramework\App\ILogger' => 'src/App/ILogger.php',
    'VFramework\App\Logs' => 'src/App/Logs.php',
    'VFramework\App\NullCacheDriver' => 'src/App/NullCacheDriver.php',
    'VFramework\App\NullDataDriver' => 'src/App/NullDataDriver.php',
    'VFramework\App\NullDataItemStreamWrapper' => 'src/App/NullDataItemStreamWrapper.php',
    'VFramework\App\NullLogger' => 'src/App/NullLogger.php',
    'VFramework\App\Request' => 'src/App/Request.php',
    'VFramework\App\Request\Cookie' => 'src/App/Request/Cookie.php',
    'VFramework\App\Request\Cookies' => 'src/App/Request/Cookies.php',
    'VFramework\App\Request\FormDataItem' => 'src/App/Request/FormDataItem.php',
    'VFramework\App\Request\FormDataFileItem' => 'src/App/Request/FormDataFileItem.php',
    'VFramework\App\Request\FormData' => 'src/App/Request/FormData.php',
    'VFramework\App\Request\Header' => 'src/App/Request/Header.php',
    'VFramework\App\Request\Headers' => 'src/App/Request/Headers.php',
    'VFramework\App\Request\Path' => 'src/App/Request/Path.php',
    'VFramework\App\Request\QueryItem' => 'src/App/Request/QueryItem.php',
    'VFramework\App\Request\Query' => 'src/App/Request/Query.php',
    'VFramework\App\Response' => 'src/App/Response.php',
    'VFramework\App\Response\Cookie' => 'src/App/Response/Cookie.php',
    'VFramework\App\Response\Cookies' => 'src/App/Response/Cookies.php',
    'VFramework\App\Response\FileReader' => 'src/App/Response/FileReader.php',
    'VFramework\App\Response\HTML' => 'src/App/Response/HTML.php',
    'VFramework\App\Response\Header' => 'src/App/Response/Header.php',
    'VFramework\App\Response\Headers' => 'src/App/Response/Headers.php',
    'VFramework\App\Response\JSON' => 'src/App/Response/JSON.php',
    'VFramework\App\Response\NotFound' => 'src/App/Response/NotFound.php',
    'VFramework\App\Response\PermanentRedirect' => 'src/App/Response/PermanentRedirect.php',
    'VFramework\App\Response\TemporaryRedirect' => 'src/App/Response/TemporaryRedirect.php',
    'VFramework\App\Response\TemporaryUnavailable' => 'src/App/Response/TemporaryUnavailable.php',
    'VFramework\App\Response\Text' => 'src/App/Response/Text.php',
    'VFramework\App\Routes' => 'src/App/Routes.php',
    'VFramework\App\SendResponseEventDetails' => 'src/App/SendResponseEventDetails.php',
    'VFramework\App\Shortcuts' => 'src/App/Shortcuts.php',
    'VFramework\App\URLs' => 'src/App/URLs.php',
    'VFramework\Addon' => 'src/Addon.php',
    'VFramework\Addons' => 'src/Addons.php',
    'VFramework\App' => 'src/App.php',
    'VFramework\DataList' => 'src/DataList.php',
    'VFramework\DataList\Action' => 'src/DataList/Action.php',
    'VFramework\DataList\Context' => 'src/DataList/Context.php',
    'VFramework\DataList\FilterByAction' => 'src/DataList/FilterByAction.php',
    'VFramework\DataList\SliceAction' => 'src/DataList/SliceAction.php',
    'VFramework\DataList\SlicePropertiesAction' => 'src/DataList/SlicePropertiesAction.php',
    'VFramework\DataList\SortByAction' => 'src/DataList/SortByAction.php',
    'VFramework\DataObject' => 'src/DataObject.php',
    'VFramework\Internal\DataItemStreamWrapper' => 'src/Internal/DataItemStreamWrapper.php',
    'VFramework\Internal\ErrorHandler' => 'src/Internal/ErrorHandler.php',
    'VFramework\Internal\Utilities' => 'src/Internal/Utilities.php',
];

spl_autoload_register(function ($class) use ($classes) {
    if (isset($classes[$class])) {
        require __DIR__ . '/' . $classes[$class];
    }
}, true);
