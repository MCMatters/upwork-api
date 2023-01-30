<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class FreelanceOffer extends Endpoint
{
    public function list(array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/offers/v1/contractors/offers.json')
            ->json();
    }

    public function get(int|string $offerId): array
    {
        return $this->httpClient
            ->get("api/offers/v1/contractors/offers/{$offerId}.json")
            ->json();
    }

    public function setAcceptance(int|string $offerId, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post("api/offers/v1/contractors/actions/{$offerId}.json")
            ->json();
    }
}
