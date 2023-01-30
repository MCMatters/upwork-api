<?php

declare(strict_types=1);

namespace McMatters\UpworkApi;

use McMatters\UpworkApi\Endpoints\Authorization;

use const false;

class UpworkAuthClient
{
    protected Authorization $auth;

    public function __construct(string $clientId, string $clientSecret)
    {
        $this->auth = new Authorization($clientId, $clientSecret);
    }

    public function authorize(
        string $redirectUrl,
        bool $inConsole = false
    ): string {
        return $this->auth->authorize($redirectUrl, $inConsole);
    }

    public function accessToken(string $redirectUri, string $code): array
    {
        return $this->auth->accessToken($redirectUri, $code);
    }

    public function refreshToken(string $refreshToken): array
    {
        return $this->auth->refreshToken($refreshToken);
    }
}
