<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use McMatters\Ticl\Client;

use function header;
use function readline;
use function trim;

use const false;

class Authorization extends Endpoint
{
    public function __construct(
        string $clientId,
        string $clientSecret
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->setHttpClient();
    }

    public function authorize(
        string $redirectUrl,
        bool $inConsole = false
    ): string {
        $url = (clone $this->httpClient)->getFullUrl('ab/account-security/oauth2/authorize');

        $url .= '?'.http_build_query([
                'response_type' => 'code',
                'client_id' => $this->clientId,
                'redirect_url' => $redirectUrl,
            ]);

        if ($inConsole) {
            echo "Please visit\n{$url}\nand paste here 'code' from url \n";

            return trim(readline());
        }

        header("Location: {$url}");
        exit;
    }

    public function accessToken(string $redirectUri, string $code): array
    {
        return $this->httpClient
            ->withHeaders([
                'Content-type' => 'application/x-www-form-urlencoded',
            ])
            ->post('api/v3/oauth2/token', [
                'body' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'code' => $code,
                    'redirect_uri' => $redirectUri,
                ],
            ])
            ->json();
    }

    public function refreshToken(string $refreshToken): array
    {
        return $this->httpClient
            ->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])
            ->post('api/v3/oauth2/token', [
                'body' => [
                    'grant_type' => 'refresh_token',
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'refresh_token' => $refreshToken,
                ],
            ])
            ->json();
    }

    protected function setHttpClient(): void
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://www.upwork.com/',
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
            ],
            'query_params' => [
                'enc_type' => PHP_QUERY_RFC3986,
            ],
        ]);
    }
}
