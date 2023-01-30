<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class User extends Endpoint
{
    public function current(): array
    {
        return $this->httpClient->get('api/auth/v1/info.json')->json();
    }

    public function get(int|string $id): array
    {
        return $this->httpClient->get("api/hr/v2/users/{$id}.json")->json();
    }

    public function roles(): array
    {
        return $this->httpClient->get('api/hr/v2/userroles.json')->json();
    }
}
