<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function implode;
use function is_array;

class EngagementActivity extends Endpoint
{
    public function list(int|string $engagementReference, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/tasks/v2/tasks/contracts/{$engagementReference}.json")
            ->json();
    }

    public function assign(
        int|string $companyId,
        int|string $teamId,
        int|string $engagementReference,
        array|string $tasks
    ): array {
        $tasks = is_array($tasks) ? implode(';', $tasks) : $tasks;

        return $this->httpClient
            ->withJson(['tasks' => $tasks])
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/engagements/{$engagementReference}/tasks.json")
            ->json();
    }

    public function assignToEngagement(
        int|string $engagementReference,
        array|string $tasks
    ): array {
        $tasks = is_array($tasks) ? implode(';', $tasks) : $tasks;

        return $this->httpClient
            ->withJson(['tasks' => $tasks])
            ->put("api/tasks/v2/tasks/contracts/{$engagementReference}.json")
            ->json();
    }
}
