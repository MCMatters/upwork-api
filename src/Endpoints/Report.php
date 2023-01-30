<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Report extends Endpoint
{
    public function getHoursByTeam(
        int|string $companyId,
        int|string $teamId,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/companies/{$companyId}/teams/{$teamId}/hours")
            ->json();
    }

    public function getByTeam(
        int|string $companyId,
        int|string $teamId,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/companies/{$companyId}/teams/{$teamId}")
            ->json();
    }

    public function getByCompany(int|string $companyId, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/companies/{$companyId}")
            ->json();
    }

    public function getByAgency(
        int|string $companyId,
        int|string $agencyId,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/companies/{$companyId}/agencies/{$agencyId}")
            ->json();
    }

    public function getHoursByFreelancer(int|string $userId, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/providers/{$userId}/hours")
            ->json();
    }

    public function getByFreelancer(int|string $userId, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/timereports/v1/providers/{$userId}")
            ->json();
    }
}
