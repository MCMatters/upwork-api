<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class EarningReport extends Endpoint
{
    public function getByFreelancer(int|string $providerReference, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/providers/{$providerReference}/earnings")
            ->json();
    }

    public function getByBuyersTeam(int|string $buyerTeamReference, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/buyer_teams/{$buyerTeamReference}/earnings")
            ->json();
    }

    public function getByBuyersCompany(
        int|string $buyerCompanyReference,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/buyer_companies/{$buyerCompanyReference}/earnings")
            ->json();
    }
}
