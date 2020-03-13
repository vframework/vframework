<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Context;

/**
 * Provides functionality for autoloading classes in the current context.
 */
class Classes
{

    /**
     *
     * @var string 
     */
    private $dir = '';

    /**
     *
     * @var \VFramework\App\Classes 
     */
    private $appClasses = null;

    /**
     * 
     * @param \VFramework\App $app
     * @param string $dir The directory where the current addon or application are located.
     */
    public function __construct(\VFramework\App $app, string $dir)
    {
        $this->dir = \VFramework\Internal\Utilities::normalizePath($dir);
        $this->appClasses = $app->classes;
    }

    /**
     * Registers a class for autoloading in the current context.
     * 
     * @param string $class The class name or class name pattern (format: Namespace\*).
     * @param string $filename The filename that contains the class or path pattern (format: path/to/file/*.php).
     * @return self Returns a reference to itself.
     */
    public function add(string $class, string $filename): self
    {
        $this->appClasses->add($class, $this->dir . '/' . $filename);
        return $this;
    }

}
