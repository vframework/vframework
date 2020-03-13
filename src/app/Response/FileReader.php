<?php

/*
 * V Framework
 * http://vframework.cn
 * Copyright (c) Duzhenye
 * Free to use under the MIT license.
 */

namespace VFramework\App\Response;

/**
 * Response type that reads file and outputs it.
 * 
 * @property string $filename The filename to output.
 */
class FileReader extends \VFramework\App\Response
{

    use \Duzhenye\DataObjectTrait;

    /**
     * 
     * @param string $filename The filename to output.
     * @throws \InvalidArgumentException
     */
    public function __construct(string $filename)
    {
        parent::__construct('');

        $this
                ->defineProperty('filename', [
                    'type' => 'string',
                    'init' => function() {
                        return '';
                    },
                    'set' => function($value) {
                        if (is_file($value) && is_readable($value)) {
                            return $value;
                        }
                        throw new \InvalidArgumentException('The filename specified (' . $value . ') does not exist or is not readable.');
                    },
                    'unset' => function() {
                        return '';
                    }
                ])
        ;

        if (isset($filename[0])) {
            $this->filename = $filename;
        }
    }

}
