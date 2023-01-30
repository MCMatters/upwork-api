<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Snapshot extends Endpoint
{
    public function getByContract(
        int|string $contractId,
        int|string $timestamp
    ): array {
        return $this->httpClient
            ->get("api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json")
            ->json();
    }

    public function updateByContract(
        int|string $contractId,
        int|string $timestamp,
        array $body
    ): array {
        return $this->httpClient
            ->withJson($body)
            ->put("api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json")
            ->json();
    }

    public function deleteByContract(
        int|string $contractId,
        int|string $timestamp
    ): array {
        return $this->httpClient
            ->delete("api/team/v3/snapshots/contracts/{$contractId}/{$timestamp}.json")
            ->json();
    }
}
