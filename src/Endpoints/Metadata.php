<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Metadata extends Endpoint
{
    public function specialties(string $topic): array
    {
        return $this->httpClient
            ->withQuery(['topic' => $topic])
            ->get('api/profiles/v1/metadata/specialties.json')
            ->json();
    }

    public function categories(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v2/metadata/categories.json')
            ->json();
    }

    public function skills(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v2/metadata/skills.json')
            ->json();
    }

    public function regions(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v1/metadata/regions.json')
            ->json();
    }

    public function tests(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v1/metadata/tests.json')
            ->json();
    }

    public function reasons(array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v1/metadata/reasons.json')
            ->json();
    }
}
