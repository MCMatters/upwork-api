<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Team extends Endpoint
{
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/hr/v2/teams.json')
            ->json();
    }

    public function users(int|string $teamReference, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/hr/v2/teams/{$teamReference}/users.json")
            ->json();
    }
}
