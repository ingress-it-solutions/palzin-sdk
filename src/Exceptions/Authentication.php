<?php

/*
 * This library is free software, and it is part of the Palzin SDK project. Check LICENSE for details.
 *
 * (c) Ingress IT Solutions <info@ingressit.com>
 */

namespace Palzin\SDK\Exceptions;

use Palzin\SDK\Exception;

/**
 * @package Palzin\SDK\Exceptions
 */
class Authentication extends Exception
{
    /**
     * @param string          $message
     * @param \Exception|null $previous
     */
    public function __construct($message = null, $previous = null)
    {
        if (empty($message)) {
            $message = 'Failed to authenticate';
        }

        parent::__construct($message, 0, $previous);
    }
}
