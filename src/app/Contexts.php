<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

use VFramework\App;

/**
 * Provides information about your code context (the directory its located).
 */
class Contexts
{

    /**
     *
     * @var array 
     */
    private $dirs = [];

    /**
     *
     * @var array 
     */
    private $objectsCache = [];

    /**
     *
     * @var \VFramework\App 
     */
    private $app = null;

    /**
     * 
     * @param \VFramework\App $app
     */
    public function __construct(\VFramework\App $app)
    {
        $this->app = $app;
    }

    /**
     * Returns a context object for the filename specified.
     * 
     * @param string|null $filename The filename used to find the context. Will be automatically detected if not provided. Passing the context dir has performance benefits.
     * @throws \Exception
     * @return \VFramework\App\Context The context object for the filename specified.
     */
    public function get(string $filename = null): \VFramework\App\Context
    {
        if ($filename === null) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
            if (!isset($trace[0])) {
                throw new \Exception('Cannot detect context!');
            }
            $filename = $trace[0]['file'];
        }
        $filename = \VFramework\Internal\Utilities::normalizePath($filename);
        if (isset($this->objectsCache[$filename])) {
            return $this->objectsCache[$filename];
        }
        if (isset($this->dirs[$filename])) {
            $matchedDir = $filename;
        } else {
            $matchedDir = null;
            foreach ($this->dirs as $dir => $length) {
                if (substr($filename, 0, $length + 1) === $dir . '/') {
                    $matchedDir = $dir;
                    break;
                }
            }
        }
        if ($matchedDir !== null) {
            if (isset($this->objectsCache[$matchedDir])) {
                return $this->objectsCache[$matchedDir];
            }
            $this->objectsCache[$matchedDir] = new App\Context($this->app, $matchedDir);
            if ($matchedDir !== $filename) {
                $this->objectsCache[$filename] = $this->objectsCache[$matchedDir];
            }
            return $this->objectsCache[$matchedDir];
        }
        throw new \Exception('Connot find context for ' . $filename);
    }

    /**
     * Registers a new context.
     * 
     * @param string $dir The context dir.
     * @throws \Exception
     * @return self Returns a reference to itself.
     */
    public function add(string $dir): self
    {
        $dir = rtrim(\VFramework\Internal\Utilities::normalizePath($dir), '/');
        if (!isset($this->dirs[$dir])) {
            $this->dirs[$dir] = strlen($dir);
            arsort($this->dirs);
            $indexFilename = $dir . '/index.php';
            if (is_file($indexFilename)) {
                ob_start();
                try {
                    (static function ($__filename) {
                        include $__filename;
                    })($indexFilename);
                    ob_end_clean();
                } catch (\Exception $e) {
                    ob_end_clean();
                    throw $e;
                }
            } else {
                throw new \Exception('Cannot find index.php file in the dir specified (' . $dir . ')!');
            }
        }
        return $this;
    }
}
