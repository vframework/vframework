<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App;

/**
 * A logger interface.
 * @codeCoverageIgnore
 */
interface ILogger
{

    /**
     * Logs the data specified.
     * 
     * @param string $name The name of the log context.
     * @param string $message The message that will be logged.
     * @param array $data Additional information to log.
     * @return void No value is returned.
     */
    public function log(string $name, string $message, array $data = []): void;
}
