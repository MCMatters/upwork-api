<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Engagement extends Endpoint
{
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/hr/v2/engagements.json')
            ->json();
    }

    public function get(int|string $reference): array
    {
        return $this->httpClient
            ->get("api/hr/v2/engagements/{$reference}.json")
            ->json();
    }
}
