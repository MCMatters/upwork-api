<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function date;
use function implode;
use function is_array;

use const null;

class WorkDiary extends Endpoint
{
    public function get(
        string $companyId,
        ?string $date = null,
        array $query = []
    ): array {
        $date ??= date('Ymd');

        return $this->httpClient
            ->withQuery($query)
            ->get("api/team/v3/workdiaries/companies/{$companyId}/{$date}.json")
            ->json();
    }

    public function getByContracts(
        array|string $contractIds,
        string $date = null,
        array $query = []
    ): array {
        $contractIds = is_array($contractIds)
            ? implode(';', $contractIds)
            : $contractIds;

        $date ??= date('Ymd');

        return $this->httpClient
            ->withQuery($query)
            ->get("api/team/v3/workdiaries/contracts/{$contractIds}/{$date}.json")
            ->json();
    }

    public function getByContract(
        string $contractId,
        ?string $date = null,
        array $query = []
    ): array {
        return $this->getByContracts($contractId, $date, $query);
    }
}
