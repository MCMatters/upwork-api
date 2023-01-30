<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use McMatters\Ticl\Http\Response;

class CompanyActivity extends Endpoint
{
    public function archive(int|string $companyId, string $code): array
    {
        return $this->httpClient
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$companyId}/archive/{$code}.json")
            ->json();
    }

    public function unarchive(int|string $companyId, string $code): array
    {
        return $this->httpClient
            ->put("api/otask/v1/tasks/companies/{$companyId}/teams/{$companyId}/unarchive/{$code}.json")
            ->json();
    }

    public function updateBatch(int|string $companyId, string $data): Response
    {
        return $this->httpClient
            ->withJson(['data' => $data])
            ->put("api/otask/v1/tasks/companies/{$companyId}/tasks/batch.json");
    }
}
