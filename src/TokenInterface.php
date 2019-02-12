<?php

/*
 * This library is free software, and it is part of the Palzin SDK project. Check LICENSE for details.
 *
 * (c) Ingress IT Solutions <info@ingressit.com>
 */

namespace Palzin\SDK;

/**
 * @package Palzin\SDK
 */
interface TokenInterface
{
    /**
     * @return string
     */
    public function getToken();

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @return string
     */
    public function __toString();
}
