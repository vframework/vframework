<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

use VFramework\Internal\Utilities;

/**
 *  Provides a way to enable addons.
 */
class Addons
{

    /**
     *
     * @var array 
     */
    private $data = [];

    /**
     *
     * @var \VFramework\App\Contexts
     */
    private $appContexts = null;

    /**
     * 
     * @param \VFramework\App $app
     */
    public function __construct(\VFramework\App $app)
    {
        $this->appContexts = $app->contexts;
    }

    /**
     * Enables an addon.
     * 
     * @param string $id The id of the addon.
     * @throws \Exception
     * @return self Returns a reference to itself.
     */
    public function add(string $id): self
    {
        if (!isset($this->data[$id])) {
            if (!isset(Utilities::$registeredAddons[$id])) {
                throw new \Exception('The addon ' . $id . ' is not registered!');
            }
            $registeredAddonRawData = Utilities::$registeredAddons[$id];
            $registeredAddonOptions = $registeredAddonRawData[1];
            if (isset($registeredAddonOptions['require']) && is_array($registeredAddonOptions['require'])) {
                foreach ($registeredAddonOptions['require'] as $requiredAddonID) {
                    if (is_string($requiredAddonID) && !isset($this->data[$requiredAddonID])) {
                        $this->add($requiredAddonID);
                    }
                }
            }
            $this->data[$id] = [null];
            $this->appContexts->add($registeredAddonRawData[0]);
        }
        return $this;
    }

    /**
     * Returns the enabled addon or null if not found.
     * 
     * @param string $id The id of the addon.
     * @return VFramework\App\Addon|null The enabled addon or null if not found.
     */
    public function get(string $id): ?\VFramework\App\Addon
    {
        if (isset($this->data[$id])) {
            $rawData = &$this->data[$id];
            if ($rawData[0] === null) {
                $rawData[0] = new \VFramework\App\Addon($id, Utilities::$registeredAddons[$id][0]);
            }
            return clone ($rawData[0]);
        }
        return null;
    }

    /**
     * Returns information whether an addon with the id specified is enabled.
     * 
     * @param string $id  The id of the addon.
     * @return bool TRUE if an addon with the name specified is enabled, FALSE otherwise.
     */
    public function exists(string $id): bool
    {
        return isset($this->data[$id]);
    }

    /**
     * Returns a list of all enabled addons.
     * 
     * @return \VFramework\DataList|\VFramework\App\Addon[] An array containing all enabled addons.
     */
    public function getList()
    {
        $list = new \VFramework\DataList();
        foreach ($this->data as $addonID => $rawData) {
            $list[] = $this->get($addonID);
        }
        return $list;
    }
}
