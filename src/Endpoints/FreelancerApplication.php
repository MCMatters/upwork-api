<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class FreelancerApplication extends Endpoint
{
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/hr/v4/contractors/applications.json')
            ->json();
    }

    public function get(int|string $applicationId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/hr/v4/contractors/applications/{$applicationId}.json")
            ->json();
    }
}
