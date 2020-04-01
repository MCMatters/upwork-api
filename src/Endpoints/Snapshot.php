<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Snapshot
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Snapshot extends Endpoint
{
    /**
     * @param int|string $contractId
     * @param int|string $timestamp
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByContract($contractId, $timestamp): array
    {
        return $this->requestJson(
            'get',
            "api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json"
        );
    }

    /**
     * @param int|string $contractId
     * @param int|string $timestamp
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function updateByContract(
        $contractId,
        $timestamp,
        array $body
    ): array {
        return $this->requestJson(
            'put',
            "api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $contractId
     * @param int|string $timestamp
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function deleteByContract($contractId, $timestamp): array
    {
        return $this->requestJson(
            'delete',
            "api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json"
        );
    }
}
