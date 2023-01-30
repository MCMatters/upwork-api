<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Company extends Endpoint
{
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/hr/v2/companies.json')
            ->json();
    }

    public function get(int|string $companyReference): array
    {
        return $this->httpClient
            ->get("api/hr/v2/companies/{$companyReference}.json")
            ->json();
    }

    public function teams(int|string $companyReference, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/hr/v2/companies/{$companyReference}/teams.json")
            ->json();
    }

    public function users(int|string $companyReference, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/hr/v2/companies/{$companyReference}/users.json")
            ->json();
    }
}
