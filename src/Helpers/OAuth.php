<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Helpers;

use McMatters\UpworkApi\Endpoints\Endpoint;

use function base64_encode, hash_hmac, implode, ksort, rawurlencode, strpos,
    strtoupper, time, uniqid;

use const null, true;

/**
 * Class OAuth
 *
 * @package McMatters\UpworkApi\Helpers
 */
class OAuth
{
    /**
     * @param \McMatters\UpworkApi\Endpoints\Endpoint $endpoint
     * @param string $method
     * @param string $url
     * @param array $options
     *
     * @return string
     */
    public static function getAuthorizationHeader(
        Endpoint $endpoint,
        string $method,
        string $url,
        array $options = []
    ): string {
        $nonce = uniqid('', true);
        $timestamp = time();
        $signatureMethod = 'HMAC-SHA1';
        $version = '1.0';
        $baseData = [];

        $token = $endpoint->getToken();
        $secret = $endpoint->getSecret();

        $baseParts = [
            'oauth_consumer_key' => rawurlencode($endpoint->getConsumerKey()),
            'oauth_nonce' => rawurlencode($nonce),
            'oauth_signature_method' => rawurlencode($signatureMethod),
            'oauth_timestamp' => rawurlencode((string) $timestamp),
            'oauth_version' => rawurlencode($version),
        ];

        if (null !== $token) {
            $baseParts['oauth_token'] = $token;
        }

        if (!empty($options['headers']['oauth_verifier'])) {
            $baseParts['oauth_verifier'] = $options['headers']['oauth_verifier'];
        }

        foreach ($options['query'] ?? [] as $queryKey => $queryData) {
            $baseParts[$queryKey] = rawurlencode($queryData);
        }

        ksort($baseParts);

        foreach ($baseParts as $basePartKey => $basePartData) {
            $baseData[] = "{$basePartKey}={$basePartData}";
        }

        $signature = self::generateSignature(
            strtoupper($method).'&'.rawurlencode($url).'&'.rawurlencode(implode('&', $baseData)),
            rawurlencode($endpoint->getConsumerSecret()).'&'.rawurlencode($secret ?? '')
        );

        $oauthPayload = [
            "oauth_nonce={$nonce}",
            "oauth_consumer_key={$endpoint->getConsumerKey()}",
            "oauth_signature_method={$signatureMethod}",
            "oauth_timestamp={$timestamp}",
            "oauth_version={$version}",
            "oauth_signature={$signature}",
        ];

        if ($token) {
            $oauthPayload[] = "oauth_token={$token}";
        }

        foreach ($options['headers'] ?? [] as $headerKey => $headerValue) {
            if (strpos($headerKey, 'oauth_') === 0) {
                $oauthPayload[] = "{$headerKey}={$headerValue}";
            }
        }

        return 'OAuth '.implode(',', $oauthPayload);
    }

    /**
     * @param string $base
     * @param string $key
     *
     * @return string
     */
    public static function generateSignature(string $base, string $key): string
    {
        return base64_encode(hash_hmac('sha1', $base, $key, true));
    }
}
