<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

class Message extends Endpoint
{
    public function rooms(int|string $companyId, array $query = []): array
    {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms.json")
            ->json();
    }

    public function getRoom(
        int|string $companyId,
        int|string $roomId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms/{$roomId}.json")
            ->json();
    }

    public function getRoomByOfferId(
        int|string $companyId,
        int|string $offerId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms/offers/{$offerId}.json")
            ->json();
    }

    public function getRoomByApplicationId(
        int|string $companyId,
        int|string $applicationId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms/applications/{$applicationId}.json")
            ->json();
    }

    public function getRoomByContractId(
        int|string $companyId,
        int|string $contractId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms/contracts/{$contractId}.json")
            ->json();
    }

    public function createRoom(int|string $companyId, array $body): array
    {
        return $this->httpClient
            ->withJson($body)
            ->post("api/messages/v3/{$companyId}/rooms.json")
            ->json();
    }

    public function messages(
        int|string $companyId,
        int|string $roomId,
        array $query = []
    ): array {
        return $this->httpClient
            ->withQuery($query)
            ->get("api/messages/v3/{$companyId}/rooms/{$roomId}/stories.json")
            ->json();
    }

    public function sendMessageToRoom(
        int|string $companyId,
        int|string $roomId,
        array $body
    ): array {
        return $this->httpClient
            ->withJson($body)
            ->post("api/messages/v3/{$companyId}/rooms/{$roomId}/stories.json")
            ->json();
    }

    public function updateRoomSettings(
        int|string $companyId,
        int|string $roomId,
        int|string $userId,
        array $body
    ): array {
        return $this->httpClient
            ->withJson($body)
            ->put("api/messages/v3/{$companyId}/rooms/{$roomId}/users/{$userId}.json")
            ->json();
    }

    public function updateRoomMetadata(
        int|string $companyId,
        int|string $roomId,
        array $body
    ): array {
        return $this->httpClient
            ->withJson(['metadata' => $body])
            ->put("api/messages/v3/{$companyId}/rooms/{$roomId}.json")
            ->json();
    }
}
