<?php

/*
 * This library is free software, and it is part of the Palzin SDK project. Check LICENSE for details.
 *
 * (c) Ingress IT Solutions <info@ingressit.com>
 */

namespace Palzin\SDK\Exceptions;

/**
 * @package Palzin\SDK\Exceptions
 */
class ListAccounts extends Authentication
{
    /**
     * @param string          $message
     * @param \Exception|null $previous
     */
    public function __construct($message = null, $previous = null)
    {
        if (empty($message)) {
            $message = 'Failed to list user accounts';
        }

        parent::__construct($message, $previous);
    }
}
