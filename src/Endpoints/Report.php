<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Report
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Report extends Endpoint
{
    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getHoursByTeam($companyId, $teamId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/companies/{$companyId}/teams/{$teamId}/hours",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByTeam($companyId, $teamId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/companies/{$companyId}/teams/{$teamId}",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByCompany($companyId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/companies/{$companyId}",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $agencyId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByAgency($companyId, $agencyId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/companies/{$companyId}/agencies/{$agencyId}",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $userId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getHoursByFreelancer($userId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/providers/{$userId}/hours",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $userId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByFreelancer($userId, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/timereports/v1/providers/{$userId}",
            ['query' => $query]
        );
    }
}
