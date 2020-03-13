<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

use VFramework\App;
use VFramework\App\CacheItem;

/**
 * Data cache
 * @event \VFramework\App\Cache\ItemRequestEvent itemRequest An event dispatched after a cache item is requested.
 * @event \VFramework\App\Cache\ItemChangeEvent itemChange An event dispatched after a cache item is changed.
 * @event \VFramework\App\Cache\ItemSetEvent itemSet An event dispatched after a cache item is added or updated.
 * @event \VFramework\App\Cache\ItemGetEvent itemGet An event dispatched after a cache item is requested.
 * @event \VFramework\App\Cache\ItemGetValueEvent itemGetValue An event dispatched after the value of a cache item is requested.
 * @event \VFramework\App\Cache\ItemExistsEvent itemExists An event dispatched after a cache item is checked for existence.
 * @event \VFramework\App\Cache\ItemDeleteEvent itemDelete An event dispatched after a cache item is deleted.
 * @event null clear An event dispatched after the cache is cleared.
 */
class CacheRepository
{

    use \VFramework\EventsTrait;

    /**
     *
     */
    private $newCacheItemCache = null;

    /**
     *
     * @var ?\VFramework\App\ICacheDriver  
     */
    private $driver = null;

    /**
     * Enables the app cache driver. The cached data will be stored in the app data repository.
     * 
     * @param string $keyPrefix The key prefix for the cache items.
     * @return self Returns a reference to itself.
     */
    public function useAppDataDriver(string $keyPrefix = '.temp/cache/'): self
    {
        $app = App::get();
        $this->setDriver(new \VFramework\App\DataCacheDriver($app->data, $keyPrefix));
        return $this;
    }

    /**
     * Enables the null cache driver. No data is stored and no errors are thrown.
     * 
     * @return self Returns a reference to itself.
     */
    public function useNullDriver(): self
    {
        $this->setDriver(new \VFramework\App\NullCacheDriver());
        return $this;
    }

    /**
     * Sets a new cache driver.
     * 
     * @param \VFramework\App\ICacheDriver $driver The driver to use for cache storage.
     * @return self Returns a reference to itself.
     * @throws \Exception
     */
    public function setDriver(\VFramework\App\ICacheDriver $driver): self
    {
        if ($this->driver !== null) {
            throw new \Exception('A cache driver is already set!');
        }
        $this->driver = $driver;
        return $this;
    }

    /**
     * Returns the cache driver.
     * 
     * @return \VFramework\App\ICacheDriver
     * @throws \Exception
     */
    private function getDriver(): \VFramework\App\ICacheDriver
    {
        if ($this->driver !== null) {
            return $this->driver;
        }
        throw new \Exception('No cache driver specified! Use useAppDataDriver() or setDriver() to specify one.');
    }

    /**
     * Constructs a new cache item and returns it.
     * 
     * @param string|null $key The key of the cache item.
     * @param string|null $value The value of the cache item.
     * @return \VFramework\App\CacheItem Returns a new cache item.
     */
    public function make(string $key = null, $value = null): \VFramework\App\CacheItem
    {
        if ($this->newCacheItemCache === null) {
            $this->newCacheItemCache = new CacheItem();
        }
        $object = clone($this->newCacheItemCache);
        if ($key !== null) {
            $object->key = $key;
        }
        if ($value !== null) {
            $object->value = $value;
        }
        return $object;
    }

    /**
     * Stores a cache item.
     * 
     * @param \VFramework\App\CacheItem $item The cache item to store.
     * @return self Returns a reference to itself.
     */
    public function set(CacheItem $item): self
    {
        $driver = $this->getDriver();
        $driver->set($item->key, $item->value, $item->ttl);
        if ($this->hasEventListeners('itemSet')) {
            $this->dispatchEvent('itemSet', new \VFramework\App\Cache\ItemSetEventDetails(clone($item)));
        }
        if ($this->hasEventListeners('itemChange')) {
            $this->dispatchEvent('itemChange', new \VFramework\App\Cache\ItemChangeEventDetails($item->key));
        }
        return $this;
    }

    /**
     * Returns the cache item stored or null if not found.
     * 
     * @param string $key The key of the cache item.
     * @return \VFramework\App\CacheItem|null The cache item stored or null if not found.
     */
    public function get(string $key): ?\VFramework\App\CacheItem
    {
        $driver = $this->getDriver();
        $item = null;
        $value = $driver->get($key);
        if ($value !== null) {
            $item = $this->make($key, $value);
        }
        if ($this->hasEventListeners('itemGet')) {
            $this->dispatchEvent('itemGet', new \VFramework\App\Cache\ItemGetEventDetails($key, $item === null ? null : clone($item)));
        }
        if ($this->hasEventListeners('itemRequest')) {
            $this->dispatchEvent('itemRequest', new \VFramework\App\Cache\ItemRequestEventDetails($key));
        }
        return $item;
    }

    /**
     * Returns the value of the cache item specified.
     * 
     * @param string $key The key of the cache item.
     * @return mixed The value of the cache item or null if not found.
     */
    public function getValue(string $key)
    {
        $driver = $this->getDriver();
        $value = $driver->get($key);
        if ($this->hasEventListeners('itemGetValue')) {
            $this->dispatchEvent('itemGetValue', new \VFramework\App\Cache\ItemGetValueEventDetails($key, $value));
        }
        if ($this->hasEventListeners('itemRequest')) {
            $this->dispatchEvent('itemRequest', new \VFramework\App\Cache\ItemRequestEventDetails($key));
        }
        return $value;
    }

    /**
     * Returns information whether a key exists in the cache.
     * 
     * @param string $key The key of the cache item.
     * @return bool TRUE if the cache item exists in the cache, FALSE otherwise.
     */
    public function exists(string $key): bool
    {
        $driver = $this->getDriver();
        $exists = $driver->get($key) !== null;
        if ($this->hasEventListeners('itemExists')) {
            $this->dispatchEvent('itemExists', new \VFramework\App\Cache\ItemExistsEventDetails($key, $exists));
        }
        if ($this->hasEventListeners('itemRequest')) {
            $this->dispatchEvent('itemRequest', new \VFramework\App\Cache\ItemRequestEventDetails($key));
        }
        return $exists;
    }

    /**
     * Deletes an item from the cache.
     * 
     * @param string $key The key of the cache item.
     * @return self Returns a reference to itself.
     */
    public function delete(string $key): self
    {
        $driver = $this->getDriver();
        $driver->delete($key);
        if ($this->hasEventListeners('itemDelete')) {
            $this->dispatchEvent('itemDelete', new \VFramework\App\Cache\ItemDeleteEventDetails($key));
        }
        if ($this->hasEventListeners('itemChange')) {
            $this->dispatchEvent('itemChange', new \VFramework\App\Cache\ItemChangeEventDetails($key));
        }
        return $this;
    }

    /**
     * Deletes all values from the cache.
     * 
     * @return self Returns a reference to itself.
     */
    public function clear(): self
    {
        $driver = $this->getDriver();
        $driver->clear();
        if ($this->hasEventListeners('clear')) {
            $this->dispatchEvent('clear');
        }
        return $this;
    }

}
