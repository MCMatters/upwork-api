<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class ClientApplication extends Endpoint
{
    public function list(
        string $buyerTeamReference,
        string $jobKey,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery(
                [
                    'buyer_team__reference' => $buyerTeamReference,
                    'job_key' => $jobKey,
                ] + $query,
            )
            ->get('api/hr/v4/clients/applications.json')
            ->json();
    }

    public function get(
        int|string $applicationId,
        string $buyerTeamReference
    ): array {
        return $this->httpClient
            ->withQuery(['buyer_team__reference' => $buyerTeamReference])
            ->get("api/hr/v4/clients/applications/{$applicationId}.json")
            ->json();
    }
}
