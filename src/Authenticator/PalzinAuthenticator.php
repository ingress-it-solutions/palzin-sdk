<?php

/*
 * This library is free software, and it is part of the Palzin SDK project. Check LICENSE for details.
 *
 * (c) Ingress IT Solutions <info@ingressit.com>
 */

namespace Palzin\SDK\Authenticator;

use Palzin\SDK\Authenticator;
use Palzin\SDK\Exceptions\Authentication;
use Palzin\SDK\ResponseInterface;
use InvalidArgumentException;

/**
 * @package Palzin\SDK
 */
class PalzinAuthenticator extends Authenticator
{
    /**
     * @var string
     */
    private $self_hosted_url;

    /**
     * @var int
     */
    private $api_version = 1;

    /**
     * PalzinAuthenticator constructor.
     *
     * @param string   $your_org_name
     * @param string   $your_app_name
     * @param string   $email_address_or_username
     * @param string   $password
     * @param string   $self_hosted_url
     * @param int|null $api_version
     */
    public function __construct($your_org_name, $your_app_name, $email_address_or_username, $password, $self_hosted_url, $api_version = null)
    {
        parent::__construct($your_org_name, $your_app_name, $email_address_or_username, $password);

        if ($self_hosted_url && filter_var($self_hosted_url, FILTER_VALIDATE_URL)) {
            $this->self_hosted_url = rtrim($self_hosted_url, '/');
        } else {
            throw new InvalidArgumentException('Palzin Authenticator URL is not valid');
        }

        if ($api_version !== null) {
            if (is_int($api_version) && $api_version > 0) {
                $this->api_version = $api_version;
            } else {
                throw new InvalidArgumentException('API version is expected to be a number');
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function issueToken(...$arguments)
    {
        $response = $this->getConnector()->post("{$this->self_hosted_url}/api/v{$this->api_version}/issue-token", [], [
            'username' => $this->getEmailAddress(),
            'password' => $this->getPassword(),
            'client_name' => $this->getYourAppName(),
            'client_vendor' => $this->getYourOrgName(),
        ]);

        if ($response instanceof ResponseInterface) {
            if ($response->isJson()) {
                return $this->issueTokenResponseToToken($response, $this->self_hosted_url);
            } else {
                throw new Authentication(
                    sprintf(
                        'Invalid response. JSON expected, got "%s", status code "%s"',
                        $response->getContentType(),
                        $response->getHttpCode()
                    )
                );
            }
        } else {
            throw new Authentication('Invalid response');
        }
    }
}
