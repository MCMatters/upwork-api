<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

use const null;
use function date, implode, is_array;

/**
 * Class WorkDiary
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class WorkDiary extends Endpoint
{
    /**
     * @param string $companyId
     * @param string|null $date
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get(
        string $companyId,
        string $date = null,
        array $query = []
    ): array {
        $date = $date ?? date('Ymd');

        return $this->requestJson(
            'get',
            "api/team/v3/workdiaries/companies/{$companyId}/{$date}.json",
            ['query' => $query]
        );
    }

    /**
     * @param array|string $contractIds
     * @param string|null $date
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByContracts(
        $contractIds,
        string $date = null,
        array $query = []
    ): array {
        $contractIds = is_array($contractIds)
            ? implode(';', $contractIds)
            : $contractIds;

        $date = $date ?? date('Ymd');

        return $this->requestJson(
            'get',
            "api/team/v3/workdiaries/contracts/{$contractIds}/{$date}.json",
            ['query' => $query]
        );
    }

    /**
     * @param string $contractId
     * @param string|null $date
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByContract(
        string $contractId,
        string $date = null,
        array $query = []
    ): array {
        return $this->getByContracts($contractId, $date, $query);
    }
}
