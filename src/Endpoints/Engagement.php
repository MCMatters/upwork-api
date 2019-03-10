<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Engagement
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Engagement extends Endpoint
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/hr/v2/engagements.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $reference
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($reference): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v2/engagements/{$reference}.json"
        );
    }
}
