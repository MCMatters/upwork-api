<?php

declare(strict_types=1);

namespace McMatters\UpworkApi;

use McMatters\UpworkApi\Endpoints\Authorization;

use const false, null, true;

/**
 * Class UpworkAuthClient
 *
 * @package McMatters\UpworkApi
 */
class UpworkAuthClient
{
    /**
     * @var \McMatters\UpworkApi\Endpoints\Authorization
     */
    protected $auth;

    /**
     * UpworkAuthClient constructor.
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     */
    public function __construct(string $consumerKey, string $consumerSecret)
    {
        $this->auth = new Authorization($consumerKey, $consumerSecret);
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRequestToken(): array
    {
        return $this->auth->getRequestToken();
    }

    /**
     * @param string|null $oauthToken
     * @param bool $inConsole
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getVerifier(
        string $oauthToken = null,
        bool $inConsole = false
    ): string {
        return $this->auth->getVerifier($oauthToken, $inConsole);
    }

    /**
     * @param string|null $oauthToken
     *
     * @return string
     */
    public function getVerifierUrl(string $oauthToken = null): string
    {
        return $this->auth->getVerifierUrl($oauthToken);
    }

    /**
     * @param string $token
     * @param string $secret
     * @param string $verifier
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getAccessToken(
        string $token,
        string $secret,
        string $verifier
    ): array {
        return $this->auth->getAccessToken($token, $secret, $verifier);
    }

    /**
     * @param bool $inConsole
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function authorize(bool $inConsole = true): array
    {
        return $this->auth->authorize($inConsole);
    }
}
