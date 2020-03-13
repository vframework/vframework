<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * Logs repository
 */
class Logs
{

    /**
     *
     * @var ?\VFramework\App\ILogger  
     */
    private $logger = null;

    /**
     * Enables a file logger for directory specified.
     * 
     * @param string $dir The directory where the logs will be stored.
     * @return self Returns a reference to itself.
     */
    public function useFileLogger(string $dir): self
    {
        $this->setLogger(new \VFramework\App\FileLogger($dir));
        return $this;
    }

    /**
     * Enables a null logger. The null logger does not log any data and does not throw any errors.
     * 
     * @return self Returns a reference to itself.
     */
    public function useNullLogger(): self
    {
        $this->setLogger(new \VFramework\App\NullLogger());
        return $this;
    }

    /**
     * Sets a new logger.
     * 
     * @param \VFramework\App\ILogger $logger The logger to use.
     * @return self Returns a reference to itself.
     * @throws \Exception
     */
    public function setLogger(\VFramework\App\ILogger $logger): self
    {
        if ($this->logger !== null) {
            throw new \Exception('A logger is already set!');
        }
        $this->logger = $logger;
        return $this;
    }

    /**
     * Returns the logger.
     * 
     * @return \VFramework\App\ILogger
     * @throws \Exception
     */
    private function getLogger(): \VFramework\App\ILogger
    {
        if ($this->logger !== null) {
            return $this->logger;
        }
        throw new \Exception('No logger specified! Use useFileLogger() or setLogger() to specify one.');
    }

    /**
     * Logs the data specified.
     * 
     * @param string $name The name of the log context.
     * @param string $message The message that will be logged.
     * @param array $data Additional information to log.
     * @throws \InvalidArgumentException
     * @return self Returns a reference to itself.
     */
    public function log(string $name, string $message, array $data = []): self
    {
        $name = trim((string) $name);
        if (strlen($name) === 0) {
            throw new \InvalidArgumentException('The name argument must not be empty!');
        }

        $logger = $this->getLogger();
        $logger->log($name, $message, $data);
        return $this;
    }

}
