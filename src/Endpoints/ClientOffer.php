<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class ClientOffer extends Endpoint
{
    public function list(array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get('api/offers/v1/clients/offers.json')
            ->json();
    }

    public function get(int|string $offerId, array $query): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/offers/v1/clients/offers/{$offerId}.json")
            ->json();
    }

    public function send(array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post('api/offers/v1/clients/offers.json')
            ->json();
    }
}
