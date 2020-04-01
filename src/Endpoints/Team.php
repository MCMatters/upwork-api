<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Team
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Team extends Endpoint
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
            'api/hr/v2/teams.json',
            ['query' => $query]
        );
    }

    /**
     * @param int|string $teamReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function users($teamReference, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v2/teams/{$teamReference}/users.json",
            ['query' => $query]
        );
    }
}
