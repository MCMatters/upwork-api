<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Milestone extends Endpoint
{
    public function getActive(int|string $contractReference): array
    {
        return $this->httpClient
            ->get("api/hr/v3/fp/milestones/statuses/active/contracts/{$contractReference}.json")
            ->json();
    }

    public function submissions(int $id, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/hr/v3/fp/milestones/{$id}/submissions.json")
            ->json();
    }

    public function create(array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post('api/hr/v3/fp/milestones.json')
            ->json();
    }

    public function update(int $id, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v3/fp/milestones/{$id}.json")
            ->json();
    }

    public function activate(int $id, array $body = []): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v3/fp/milestones/{$id}/activate.json")
            ->json();
    }

    public function approve(int $id, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v3/fp/milestones/{$id}/approve.json")
            ->json();
    }

    public function delete(int $id): array
    {
        return $this->httpClient
            ->delete("api/hr/v3/fp/milestones/{$id}.json")
            ->json();
    }
}
