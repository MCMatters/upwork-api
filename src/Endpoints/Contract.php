<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Contract
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Contract extends Endpoint
{
    /**
     * @param int|string $reference
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function suspend($reference, array $body = []): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v2/contracts/{$reference}/suspend.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $reference
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function restart($reference, array $body = []): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v2/contracts/{$reference}/restart.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $reference
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function end($reference, array $query): array
    {
        return $this->requestJson(
            'delete',
            "api/hr/v2/contracts/{$reference}.json",
            ['query' => $query]
        );
    }
}
