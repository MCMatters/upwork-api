<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Helpers;

use McMatters\UpworkApi\Endpoints\Endpoint;
use const true;
use function base64_encode, hash_hmac, implode, ksort, rawurlencode, strtoupper,
    time, uniqid;

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
     * @param array $query
     *
     * @return string
     */
    public static function getAuthorizationHeader(
        Endpoint $endpoint,
        string $method,
        string $url,
        array $query = []
    ): string {
        $nonce = uniqid('', true);
        $timestamp = time();
        $signatureMethod = 'HMAC-SHA1';
        $version = '1.0';
        $baseData = [];

        $baseParts = [
            'oauth_consumer_key' => rawurlencode($endpoint->getConsumerKey()),
            'oauth_nonce' => rawurlencode($nonce),
            'oauth_signature_method' => rawurlencode($signatureMethod),
            'oauth_timestamp' => rawurlencode((string) $timestamp),
            'oauth_token' => rawurlencode($endpoint->getToken()),
            'oauth_version' => rawurlencode($version),
        ];

        foreach ($query as $queryKey => $queryData) {
            $baseParts[$queryKey] = rawurlencode($queryData);
        }

        ksort($baseParts);

        foreach ($baseParts as $basePartKey => $basePartData) {
            $baseData[] = "{$basePartKey}={$basePartData}";
        }

        $signature = self::generateSignature(
            strtoupper($method).'&'.rawurlencode($url).'&'.rawurlencode(implode('&', $baseData)),
            rawurlencode($endpoint->getConsumerSecret()).'&'.rawurlencode($endpoint->getSecret())
        );

        return 'OAuth '.implode(',', [
                "oauth_token={$endpoint->getToken()}",
                "oauth_nonce={$nonce}",
                "oauth_consumer_key={$endpoint->getConsumerKey()}",
                "oauth_signature_method={$signatureMethod}",
                "oauth_timestamp={$timestamp}",
                "oauth_version={$version}",
                "oauth_signature={$signature}",
            ]);
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
