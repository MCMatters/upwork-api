<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Submission extends Endpoint
{
    public function create(array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post('api/hr/v3/fp/submissions.json')
            ->json();
    }

    public function approve(int $id, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v3/fp/submissions/{$id}/approve.json")
            ->json();
    }

    public function reject(int $id, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v3/fp/submissions/{$id}/reject.json")
            ->json();
    }
}
