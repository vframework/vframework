<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * File based data driver
 */
class FileDataDriver implements \VFramework\App\IDataDriver
{

    /**
     * The instance of the Object Storage library
     * 
     * @var ?\Duzhenye\ObjectStorage 
     */
    private $objectStorageInstance = null;

    /**
     *
     * @var ?string 
     */
    private $dir = null;

    /**
     *
     * @var ?\VFramework\App\DataItem 
     */
    private $newDataItemCache = null;

    /**
     * 
     * @param string $dir The directory where the data will be stored.
     */
    public function __construct(string $dir)
    {
        $dir = rtrim($dir, '/\\');
        if (!is_dir($dir)) {
            throw new \Exception('The directory specified is not valid.');
        }
        $this->dir = $dir;
    }

    /**
     * Stores a data item.
     * 
     * @param \VFramework\App\DataItem $item The data item to store.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function set(DataItem $item): void
    {
        $command = [
            'command' => 'set',
            'key' => $item->key,
            'body' => $item->value,
            'metadata.*' => ''
        ];
        $metadataAsArray = $item->metadata->toArray();
        foreach ($metadataAsArray as $name => $value) {
            $command['metadata.' . $name] = $value;
        }
        $this->execute([$command]);
    }

    /**
     * Sets a new value of the item specified or creates a new item with the key and value specified.
     * 
     * @param string $key The key of the data item.
     * @param string $value The value of the data item.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function setValue(string $key, string $value): void
    {
        $this->execute([
            [
                'command' => 'set',
                'key' => $key,
                'body' => $value
            ]
        ]);
    }

    /**
     * Returns a stored data item or null if not found.
     * 
     * @param string $key The key of the stored data item.
     * @return \VFramework\App\DataItem|null A data item or null if not found.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function get(string $key): ?\VFramework\App\DataItem
    {
        $result = $this->execute([
            [
                'command' => 'get',
                'key' => $key,
                'result' => ['key', 'body', 'metadata']
            ]
        ]);
        if (isset($result[0]['key'])) {
            return $this->makeDataItemFromRawData($result[0]);
        }
        return null;
    }

    /**
     * Returns the value of a stored data item or null if not found.
     * 
     * @param string $key The key of the stored data item.
     * @return string|null The value of a stored data item or null if not found.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function getValue(string $key): ?string
    {
        $result = $this->execute([
            [
                'command' => 'get',
                'key' => $key,
                'result' => ['body']
            ]
        ]);
        if (isset($result[0]['body'])) {
            return $result[0]['body'];
        }
        return null;
    }

    /**
     * Returns TRUE if the data item exists. FALSE otherwise.
     * 
     * @param string $key The key of the stored data item.
     * @return bool TRUE if the data item exists. FALSE otherwise.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function exists(string $key): bool
    {
        $result = $this->execute([
            [
                'command' => 'exists',
                'key' => $key
            ]
        ]);
        return $result[0];
    }

    /**
     * Appends data to the data item's value specified. If the data item does not exist, it will be created.
     * 
     * @param string $key The key of the data item.
     * @param string $content The content to append.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function append(string $key, string $content): void
    {
        $this->execute([
            [
                'command' => 'append',
                'key' => $key,
                'body' => $content
            ]
        ]);
    }

    /**
     * Creates a copy of the data item specified.
     * 
     * @param string $sourceKey The key of the source data item.
     * @param string $destinationKey The key of the destination data item.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function duplicate(string $sourceKey, string $destinationKey): void
    {
        $this->execute([
            [
                'command' => 'duplicate',
                'sourceKey' => $sourceKey,
                'targetKey' => $destinationKey
            ]
        ]);
    }

    /**
     * Changes the key of the data item specified.
     * 
     * @param string $sourceKey The current key of the data item.
     * @param string $destinationKey The new key of the data item.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function rename(string $sourceKey, string $destinationKey): void
    {
        $this->execute([
            [
                'command' => 'rename',
                'sourceKey' => $sourceKey,
                'targetKey' => $destinationKey
            ]
        ]);
    }

    /**
     * Deletes the data item specified and it's metadata.
     * 
     * @param string $key The key of the data item to delete.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function delete(string $key): void
    {
        $this->execute([
            [
                'command' => 'delete',
                'key' => $key
            ]
        ]);
    }

    /**
     * Stores metadata for the data item specified.
     * 
     * @param string $key The key of the data item.
     * @param string $name The metadata name.
     * @param string $value The metadata value.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function setMetadata(string $key, string $name, string $value): void
    {
        $this->execute([
            [
                'command' => 'set',
                'key' => $key,
                'metadata.' . $name => $value
            ]
        ]);
    }

    /**
     * Retrieves metadata for the data item specified.
     * 
     * @param string $key The data item key.
     * @param string $name The metadata name.
     * @return string|null The value of the data item metadata.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function getMetadata(string $key, string $name): ?string
    {
        $result = $this->execute([
            [
                'command' => 'get',
                'key' => $key,
                'result' => ['metadata.' . $name]
            ]
                ]
        );
        return isset($result[0]['metadata.' . $name]) ? $result[0]['metadata.' . $name] : null;
    }

    /**
     * Deletes metadata for the data item key specified.
     * 
     * @param string $key The data item key.
     * @param string $name The metadata name.
     * @return void No value is returned.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function deleteMetadata(string $key, string $name): void
    {
        $this->execute([
            [
                'command' => 'set',
                'key' => $key,
                'metadata.' . $name => ''
            ]
        ]);
    }

    /**
     * Returns a list of all items in the data storage.
     * 
     * @param \VFramework\DataList\Context|null $context
     * @return \VFramework\DataList|\VFramework\App\DataItem[] A list of all items in the data storage.
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    public function getList(\VFramework\DataList\Context $context = null): \VFramework\DataList
    {
        $whereOptions = [];
        $resultKeys = [];
        if ($context !== null) {
            $limit = null;
            foreach ($context->actions as $action) {
                if ($action instanceof \VFramework\DataList\FilterByAction) {
                    $whereOptions[] = [$action->property, $action->value, $action->operator];
                } elseif ($action instanceof \VFramework\DataList\SlicePropertiesAction) {
                    foreach ($action->properties as $requestedProperty) {
                        if ($requestedProperty === 'key') {
                            $resultKeys[] = 'key';
                        } elseif ($requestedProperty === 'value') {
                            $resultKeys[] = 'body';
                        } elseif ($requestedProperty === 'metadata') {
                            $resultKeys[] = 'metadata';
                        }
                    }
                } elseif ($action instanceof \VFramework\DataList\SliceAction) {
                    $limit = $action->offset + $action->limit;
                }
            }
        }
        $resultKeys = empty($resultKeys) ? ['key', 'body', 'metadata'] : array_unique(array_merge(['key'], $resultKeys));
        $executeArgs = [
            'command' => 'search',
            'where' => $whereOptions,
            'result' => $resultKeys
        ];
        if ($limit !== null) {
            $executeArgs['limit'] = $limit;
        }
        $result = $this->execute([$executeArgs]);
        $list = new \VFramework\DataList();
        foreach ($result[0] as $rawData) {
            $list[] = $this->makeDataItemFromRawData($rawData);
        }
        return $list;
    }

    /**
     * 
     * @param array $commands
     * @return array
     * @throws \Exception
     * @throws \VFramework\App\Data\DataLockedException
     */
    private function execute(array $commands): array
    {
        try {
            if ($this->objectStorageInstance === null) {
                $this->objectStorageInstance = new \Duzhenye\ObjectStorage($this->dir . '/objects', $this->dir . '/metadata', [
                    'lockRetriesCount' => 40,
                    'lockRetryDelay' => 500000
                ]);
            }
            return $this->objectStorageInstance->execute($commands);
        } catch (\Duzhenye\ObjectStorage\ObjectLockedException $e) {
            throw new \VFramework\App\Data\DataLockedException($e->getMessage());
        } catch (\Duzhenye\ObjectStorage\ErrorException $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * 
     * @param array $rawData
     * @return \VFramework\App\DataItem
     */
    private function makeDataItemFromRawData(array $rawData): \VFramework\App\DataItem
    {
        if ($this->newDataItemCache === null) {
            $this->newDataItemCache = new \VFramework\App\DataItem();
        }
        $dataItem = clone($this->newDataItemCache);
        if (isset($rawData['key'])) {
            $dataItem->key = $rawData['key'];
        }
        if (isset($rawData['body'])) {
            $dataItem->value = $rawData['body'];
        }
        foreach ($rawData as $name => $value) {
            if (strpos($name, 'metadata.') === 0) {
                $name = substr($name, 9);
                $dataItem->metadata[$name] = $value;
            }
        }
        return $dataItem;
    }

    /**
     * Returns a DataItemStreamWrapper for the key specified.
     * 
     * @param string $key The data item key.
     * @return \VFramework\App\IDataItemStreamWrapper
     */
    public function getDataItemStreamWrapper(string $key): \VFramework\App\IDataItemStreamWrapper
    {
        return new \VFramework\App\FileDataItemStreamWrapper($key, $this->dir);
    }

}
