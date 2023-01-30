<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Contract extends Endpoint
{
    public function suspend(int|string $reference, array $body = []): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v2/contracts/{$reference}/suspend.json")
            ->json();
    }

    public function restart(int|string $reference, array $body = []): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v2/contracts/{$reference}/restart.json")
            ->json();
    }

    public function end(int|string $reference, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->delete("api/hr/v2/contracts/{$reference}.json")
            ->json();
    }
}
