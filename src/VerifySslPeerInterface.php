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
interface VerifySslPeerInterface
{
    /**
     * Return true if SSL peer will be verified.
     *
     * @return bool
     */
    public function getSslVerifyPeer();

    /**
     * Set if we should verify SSL peer (true by default).
     *
     * @param  bool  $value
     * @return $this
     */
    public function &setSslVerifyPeer($value);
}
