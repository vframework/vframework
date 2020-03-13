<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Response;

/**
 * Provides information about the response cookies
 */
class Cookies
{

    /**
     * @var array 
     */
    private $data = [];

    /**
     *
     */
    private $newCookieCache = null;

    /**
     * Constructs a new cookie and returns it.
     * 
     * @param string|null $name The name of the cookie.
     * @param string|null $value The value of the cookie.
     * @return \VFramework\App\Response\Cookie Returns a new cookie.
     */
    public function make(string $name = null, string $value = null): \VFramework\App\Response\Cookie
    {
        if ($this->newCookieCache === null) {
            $this->newCookieCache = new \VFramework\App\Response\Cookie();
        }
        $object = clone($this->newCookieCache);
        if ($name !== null) {
            $object->name = $name;
        }
        if ($value !== null) {
            $object->value = $value;
        }
        return $object;
    }

    /**
     * Sets a cookie.
     * 
     * @param \VFramework\App\Response\Cookie $cookie The cookie to set.
     * @return self Returns a reference to itself.
     */
    public function set(\VFramework\App\Response\Cookie $cookie): self
    {
        $this->data[$cookie->name] = $cookie;
        return $this;
    }

    /**
     * Returns a cookie or null if not found.
     * 
     * @param string $name The name of the cookie.
     * @return VFramework\App\Response\Cookie|null The cookie requested of null if not found.
     */
    public function get(string $name): ?\VFramework\App\Response\Cookie
    {
        if (isset($this->data[$name])) {
            return clone($this->data[$name]);
        }
        return null;
    }

    /**
     * Returns information whether a cookie with the name specified exists.
     * 
     * @param string $name The name of the cookie.
     * @return bool TRUE if a cookie with the name specified exists, FALSE otherwise.
     */
    public function exists(string $name): bool
    {
        return isset($this->data[$name]);
    }

    /**
     * Deletes a cookie if exists.
     * 
     * @param string $name The name of the cookie to delete.
     * @return self Returns a reference to itself.
     */
    public function delete(string $name): self
    {
        if (isset($this->data[$name])) {
            unset($this->data[$name]);
        }
        return $this;
    }

    /**
     * Returns a list of all cookies.
     * 
     * @return \VFramework\DataList|\VFramework\App\Response\Cookie[] An array containing all cookies.
     */
    public function getList()
    {
        $list = new \VFramework\DataList();
        foreach ($this->data as $cookie) {
            $list[] = clone($cookie);
        }
        return $list;
    }

}
