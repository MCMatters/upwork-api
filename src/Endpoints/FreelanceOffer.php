<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class FreelanceOffer
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class FreelanceOffer extends Endpoint
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
    public function list(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/offers/v1/contractors/offers.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $offerId
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($offerId): array
    {
        return $this->requestJson(
            'get',
            "api/offers/v1/contractors/offers/{$offerId}.json"
        );
    }

    /**
     * @param int|string $offerId
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function setAcceptance($offerId, array $body): array
    {
        return $this->requestJson(
            'post',
            "api/offers/v1/contractors/actions/{$offerId}.json",
            ['json' => $body]
        );
    }
}
