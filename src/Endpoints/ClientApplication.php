<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class ClientApplication
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class ClientApplication extends Endpoint
{
    /**
     * @param string $buyerTeamReference
     * @param string $jobKey
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list(
        string $buyerTeamReference,
        string $jobKey,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            'api/hr/v4/clients/applications.json',
            [
                'query' => [
                        'buyer_team__reference' => $buyerTeamReference,
                        'job_key' => $jobKey,
                    ] + $query,
            ]
        );
    }

    /**
     * @param int|string $applicationId
     * @param string $buyerTeamReference
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($applicationId, string $buyerTeamReference): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v4/clients/applications/{$applicationId}.json",
            [
                'query' => [
                    'buyer_team__reference' => $buyerTeamReference,
                ],
            ]
        );
    }
}
