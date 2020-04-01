<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class ClientOffer
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class ClientOffer extends Endpoint
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list(array $query): array
    {
        return $this->requestJson(
            'get',
            'api/offers/v1/clients/offers.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $offerId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($offerId, array $query): array
    {
        return $this->requestJson(
            'get',
            "api/offers/v1/clients/offers/{$offerId}.json",
            ['query' => $query]
        );
    }

    /**
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function send(array $body): array
    {
        return $this->requestJson(
            'post',
            'api/offers/v1/clients/offers.json',
            ['json' => $body]
        );
    }
}
