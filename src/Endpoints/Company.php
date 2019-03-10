<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Company
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Company extends Endpoint
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
            'api/hr/v2/companies.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyReference
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($companyReference): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v2/companies/{$companyReference}.json"
        );
    }

    /**
     * @param int|string $companyReference
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function teams($companyReference, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v2/companies/{$companyReference}/teams.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyReference
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function users($companyReference, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v2/companies/{$companyReference}/users.json",
            ['query' => $query]
        );
    }
}
