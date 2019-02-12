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
interface ResponseInterface
{
    /**
     * Return HTTP code.
     *
     * @return int
     */
    public function getHttpCode();

    /**
     * Return content type.
     *
     * @return string
     */
    public function getContentType();

    /**
     * Return an array of response headers.
     *
     * @return array
     */
    public function getHeaders();

    /**
     * Return raw response body.
     *
     * @return string
     */
    public function getBody();

    /**
     * Return true if response is JSON.
     *
     * @return bool
     */
    public function isJson();

    /**
     * Return response body as JSON (when applicable).
     *
     * @return mixed
     */
    public function getJson();
}
