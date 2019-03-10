<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class FreelancerApplication
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class FreelancerApplication extends Endpoint
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
            'api/hr/v4/contractors/applications.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $applicationId
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($applicationId, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v4/contractors/applications/{$applicationId}.json",
            ['query' => $query]
        );
    }
}
