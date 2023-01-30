<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Profile extends Endpoint
{
    public function search(array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/profiles/v2/search/providers.json')
            ->json();
    }

    public function getBrief(string $profileKey): array
    {
        return $this->httpClient
            ->get("api/profiles/v1/providers/{$profileKey}/brief.json")
            ->json();
    }

    public function getProfileDetails(string $profileKey): array
    {
        return $this->httpClient
            ->get("api/profiles/v1/providers/{$profileKey}.json")
            ->json();
    }
}
