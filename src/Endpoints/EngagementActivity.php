<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function implode, is_array;

/**
 * Class EngagementActivity
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class EngagementActivity extends Endpoint
{
    /**
     * @param int|string $engagementReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list($engagementReference, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/tasks/v2/tasks/contracts/{$engagementReference}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param int|string $engagementReference
     * @param array|string $tasks
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function assign(
        $companyId,
        $teamId,
        $engagementReference,
        $tasks
    ): array {
        $tasks = is_array($tasks) ? implode(';', $tasks) : $tasks;

        return $this->requestJson(
            'put',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/engagements/{$engagementReference}/tasks.json",
            ['json' => ['tasks' => $tasks]]
        );
    }

    /**
     * @param int|string $engagementReference
     * @param string $tasks
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function assignToEngagement(
        $engagementReference,
        string $tasks
    ): array {
        return $this->requestJson(
            'put',
            "api/tasks/v2/tasks/contracts/{$engagementReference}.json",
            ['json' => ['tasks' => $tasks]]
        );
    }
}
