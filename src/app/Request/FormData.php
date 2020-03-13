<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Request;

/**
 * Provides information about the response form data items.
 */
class FormData
{

    /**
     * @var array 
     */
    private $data = [];

    /**
     *
     */
    private $newFormDataItemCache = null;

    /**
     * Constructs a new form data item and returns it.
     * 
     * @param string|null $name The name of the form data item.
     * @param string|null $value The value of the form data item.
     * @return \VFramework\App\Request\FormDataItem Returns a new form data item.
     */
    public function make(string $name = null, string $value = null): \VFramework\App\Request\FormDataItem
    {
        if ($this->newFormDataItemCache === null) {
            $this->newFormDataItemCache = new \VFramework\App\Request\FormDataItem();
        }
        $object = clone($this->newFormDataItemCache);
        if ($name !== null) {
            $object->name = $name;
        }
        if ($value !== null) {
            $object->value = $value;
        }
        return $object;
    }

    /**
     * Sets a form data item.
     * 
     * @param \VFramework\App\Request\FormDataItem $form data item The form data item to set.
     * @return self Returns a reference to itself.
     */
    public function set(\VFramework\App\Request\FormDataItem $dataItem): self
    {
        $this->data[$dataItem->name] = $dataItem;
        return $this;
    }

    /**
     * Returns a form data item or null if not found.
     * 
     * @param string $name The name of the form data item.
     * @return VFramework\App\Request\FormDataItem|null The form data item requested of null if not found.
     */
    public function get(string $name): ?\VFramework\App\Request\FormDataItem
    {
        if (isset($this->data[$name])) {
            return clone($this->data[$name]);
        }
        return null;
    }

    /**
     * Returns a file data item or null if not found.
     * 
     * @param string $name The name of the file data item.
     * @return VFramework\App\Request\FormDataFileItem|null The file data item requested of null if not found.
     */
    public function getFile(string $name): ?\VFramework\App\Request\FormDataFileItem
    {
        if (isset($this->data[$name]) && $this->data[$name] instanceof \VFramework\App\Request\FormDataFileItem) {
            return $this->data[$name];
        }
        return null;
    }

    /**
     * Returns a form data item value or null if not found.
     * 
     * @param string $name The name of the form data item.
     * @return string|null The form data item value requested of null if not found.
     */
    public function getValue(string $name): ?string
    {
        if (isset($this->data[$name])) {
            return $this->data[$name]->value;
        }
        return null;
    }

    /**
     * Returns information whether a form data item with the name specified exists.
     * 
     * @param string $name The name of the form data item.
     * @return bool TRUE if a form data item with the name specified exists, FALSE otherwise.
     */
    public function exists(string $name): bool
    {
        return isset($this->data[$name]);
    }

    /**
     * Deletes a form data item if exists.
     * 
     * @param string $name The name of the form data item to delete.
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
     * Returns a list of all form data items.
     * 
     * @return \VFramework\DataList|\VFramework\App\Request\FormDataItem[] An array containing all form data items.
     */
    public function getList()
    {
        $list = new \VFramework\DataList();
        foreach ($this->data as $formDataItem) {
            $list[] = clone($formDataItem);
        }
        return $list;
    }

}
