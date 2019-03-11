<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

use McMatters\Ticl\Client;
use McMatters\Ticl\Http\Response;
use McMatters\UpworkApi\Helpers\OAuth;
use const PHP_QUERY_RFC3986;
use function array_merge_recursive;

/**
 * Class Endpoint
 *
 * @package McMatters\UpworkApi\Endpoints
 */
abstract class Endpoint
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $consumerKey;

    /**
     * @var string
     */
    protected $consumerSecret;

    /**
     * @var \McMatters\Ticl\Client
     */
    protected $httpClient;

    /**
     * Endpoint constructor.
     *
     * @param string $token
     * @param string $secret
     * @param string $consumerKey
     * @param string $consumerSecret
     */
    public function __construct(
        string $token,
        string $secret,
        string $consumerKey,
        string $consumerSecret
    ) {
        $this->token = $token;
        $this->secret = $secret;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->setHttpClient();
    }

    /**
     * @return string
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getSecret(): ?string
    {
        return $this->secret;
    }

    /**
     * @return string
     */
    public function getConsumerKey(): string
    {
        return $this->consumerKey;
    }

    /**
     * @return string
     */
    public function getConsumerSecret(): string
    {
        return $this->consumerSecret;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return \McMatters\Ticl\Http\Response
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    protected function request(
        string $method,
        string $url,
        array $options = []
    ): Response {
        $authHeader = OAuth::getAuthorizationHeader(
            $this,
            $method,
            $this->httpClient->getFullUrl($url),
            $options
        );

        return $this->httpClient
            ->{$method}(
                $url,
                array_merge_recursive(
                    ['headers' => ['Authorization' => $authHeader]],
                    $options
                )
            );
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    protected function requestJson(
        string $method,
        string $url,
        array $options = []
    ): array {
        return $this->request($method, $url, $options)->json();
    }

    /**
     * @return void
     */
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
