<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Context;

/**
 * Provides utility functions for assets in the current context.
 */
class Assets
{

    /**
     *
     * @var string 
     */
    private $dir = '';

    /**
     *
     * @var \VFramework\App\Assets 
     */
    private $appAssets = null;

    /**
     * 
     * @param \VFramework\App $app
     * @param string $dir The directory where the current addon or application are located.
     */
    public function __construct(\VFramework\App $app, string $dir)
    {
        $this->dir = \VFramework\Internal\Utilities::normalizePath($dir);
        $this->appAssets = $app->assets;
    }

    /**
     * Registers a directory that will be publicly accessible relative to the current addon or application location.
     * 
     * @param string $pathname The directory name.
     * @return self Returns a reference to itself.
     */
    public function addDir(string $pathname): self
    {
        $this->appAssets->addDir($this->dir . '/' . $pathname);
        return $this;
    }

    /**
     * Returns a public URL for the specified filename in the current context.
     * 
     * @param string $filename The filename.
     * @param array $options URL options. You can resize the file by providing "width", "height" or both.
     * @return string The URL for the specified filename and options.
     */
    public function getURL(string $filename, array $options = []): string
    {
        return $this->appAssets->getURL($this->dir . '/' . $filename, $options);
    }

    /**
     * Returns the content of the file specified in the current context.
     * 
     * @param string $filename The filename.
     * @param array $options List of options. You can resize the file by providing "width", "height" or both. You can specify encoding too (base64 or data-uri).
     * @return string|null The content of the file or null if file does not exists.
     */
    public function getContent(string $filename, array $options = []): ?string
    {
        return $this->appAssets->getContent($this->dir . '/' . $filename, $options);
    }

    /**
     * Returns a list of details for the filename specifie in the current context.
     * 
     * @param string $filename The filename of the asset.
     * @param array $list A list of details to return. Available values: mimeType, size, width, height.
     * @return array A list of tails for the filename specified.
     */
    public function getDetails(string $filename, array $list): array
    {
        return $this->appAssets->getDetails($this->dir . '/' . $filename, $list);
    }

}
