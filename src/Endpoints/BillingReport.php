<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class BillingReport extends Endpoint
{
    public function getByFreelancer(
        int|string $providerReference,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/providers/{$providerReference}/billings")
            ->json();
    }

    public function getByBuyersTeam(
        int|string $buyerTeamReference,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/buyer_teams/{$buyerTeamReference}/billings")
            ->json();
    }

    public function getByBuyersCompany(
        int|string $buyerCompanyReference,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/buyer_companies/{$buyerCompanyReference}/billings")
            ->json();
    }
}
