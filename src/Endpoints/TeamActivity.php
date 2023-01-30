<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function implode;
use function is_array;

class TeamActivity extends Endpoint
{
    public function list(
        int|string $companyId,
        int|string $teamId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks.json")
            ->json();
    }

    public function getByCode(
        int|string $companyId,
        int|string $teamId,
        array|string $code,
        array $query = []
    ): array {
        $code = is_array($code) ? implode(';', $code) : $code;

        return $this->httpClient
            ->withQuery($query)
            ->get("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks/{$code}.json")
            ->json();
    }

    public function create(
        int|string $companyId,
        int|string $teamId,
        string $code,
        string $description,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['code' => $code, 'description' => $description] + $data)
            ->post("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks.json")
            ->json();
    }

    public function update(
        int|string $companyId,
        int|string $teamId,
        string $code,
        string $description,
        array $data = []
    ): array {
        return $this->httpClient
            ->withJson(['description' => $description] + $data)
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks/{$code}.json")
            ->json();
    }

    public function archive(
        int|string $companyId,
        int|string $teamId,
        string $code
    ): array {
        return $this->httpClient
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/archive/{$code}.json")
            ->json();
    }

    public function unarchive(
        int|string $companyId,
        int|string $teamId,
        string $code
    ): array {
        return $this->httpClient
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/unarchive/{$code}.json")
            ->json();
    }
}
