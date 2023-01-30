<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class FinancialReport extends Endpoint
{
    public function getByAccount(
        int|string $accountingEntityReference,
        array $query
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("gds/finreports/v2/financial_accounts/{$accountingEntityReference}")
            ->json();
    }
}
