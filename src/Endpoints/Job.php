<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Job extends Endpoint
{
    public function search(array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v2/search/jobs.json')
            ->json();
    }

    public function list(string $buyerTeamReference, array $query = []): array
    {
        return $this->httpClient
            ->withQuery(['buyer_team__reference' => $buyerTeamReference] + $query)
            ->get('api/hr/v2/jobs.json')
            ->json();
    }

    public function get(string $jobKey): array
    {
        return $this->httpClient->get("api/hr/v2/jobs/{$jobKey}.json")->json();
    }

    public function create(array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post('api/hr/v2/jobs.json')
            ->json();
    }

    public function update(string $jobKey, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->put("api/hr/v2/jobs/{$jobKey}.json")
            ->json();
    }

    public function cancel(string $jobKey, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->delete("api/hr/v2/jobs/{$jobKey}.json")
            ->json();
    }

    public function getJobProfile(string $jobKey): array
    {
        return $this->httpClient
            ->get("api/profiles/v1/jobs/{$jobKey}.json")
            ->json();
    }

    public function invite(string $jobKey, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post("api/hr/v1/jobs/{$jobKey}/candidates.json")
            ->json();
    }
}
