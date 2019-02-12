<?php

/*
 * This library is free software, and it is part of the Palzin SDK project. Check LICENSE for details.
 *
 * (c) Ingress IT Solutions <info@ingressit.com>
 */

namespace Palzin\SDK\Exceptions;

use Palzin\SDK\Exception;

/**
 * HTTP API call exception.
 */
class FileNotReadable extends Exception
{
    /**
     * Construct the new exception instance.
     *
     * @param string $path
     */
    public function __construct($path)
    {
        if (empty($message)) {
            $message = "File '$path' is not readable";
        }

        parent::__construct($message);
    }
}
