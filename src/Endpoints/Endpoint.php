<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use McMatters\Ticl\Client;

use const PHP_QUERY_RFC3986;

abstract class Endpoint
{
    protected string $clientId;

    protected string $clientSecret;

    protected string $accessToken;

    protected Client $httpClient;

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $accessToken
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->setHttpClient();
    }

    protected function setHttpClient(): void
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://www.upwork.com/',
            'headers' => [
                'Accept' => 'application/json',
                'Content-type' => 'application/json',
                'Authorization' => "Bearer {$this->accessToken}",
            ],
            'query_params' => [
                'enc_type' => PHP_QUERY_RFC3986,
            ],
        ]);
    }
}
