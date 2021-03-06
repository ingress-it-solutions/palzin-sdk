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
class Token implements TokenInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * @var string
     */
    private $url;

    /**
     * @param string $token
     * @param string $url
     */
    public function __construct($token, $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getToken();
    }
}
