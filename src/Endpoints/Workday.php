<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Workday extends Endpoint
{
    public function getByCompany(
        string $companyId,
        string $fromDate,
        string $tillDate,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/team/v3/workdays/companies/{$companyId}/{$fromDate},{$tillDate}.json")
            ->json();
    }

    public function getByContract(
        int|string $contractId,
        string $fromDate,
        string $tillDate,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/team/v3/workdays/contracts/{$contractId}/{$fromDate},{$tillDate}.json")
            ->json();
    }
}
