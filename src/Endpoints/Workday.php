<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Workday
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Workday extends Endpoint
{
    /**
     * @param string $companyId
     * @param string $fromDate
     * @param string $tillDate
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByCompany(
        string $companyId,
        string $fromDate,
        string $tillDate,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            "api/team/v3/workdays/companies/{$companyId}/{$fromDate},{$tillDate}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $contractId
     * @param string $fromDate
     * @param string $tillDate
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByContract(
        $contractId,
        string $fromDate,
        string $tillDate,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            "api/team/v3/workdays/contracts/{$contractId}/{$fromDate},{$tillDate}.json",
            ['query' => $query]
        );
    }
}
