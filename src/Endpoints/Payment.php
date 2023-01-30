<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Payment extends Endpoint
{
    public function make(int|string $teamReference, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post("api/hr/v2/teams/{$teamReference}/adjustments.json")
            ->json();
    }
}
