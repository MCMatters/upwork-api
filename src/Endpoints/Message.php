<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Message
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Message extends Endpoint
{
    /**
     * @param int|string $companyId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function rooms($companyId, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/messages/v3/{$companyId}/rooms.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $roomId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRoom($companyId, $roomId, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/messages/v3/{$companyId}/rooms/{$roomId}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $offerId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRoomByOfferId(
        $companyId,
        $offerId,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            "api/messages/v3/{$companyId}/rooms/offers/{$offerId}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $applicationId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRoomByApplicationId(
        $companyId,
        $applicationId,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            "api/messages/v3/{$companyId}/rooms/applications/{$applicationId}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $contractId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRoomByContractId(
        $companyId,
        $contractId,
        array $query = []
    ): array {
        return $this->requestJson(
            'get',
            "api/messages/v3/{$companyId}/rooms/contracts/{$contractId}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function createRoom($companyId, array $body): array
    {
        return $this->requestJson(
            'post',
            "api/messages/v3/{$companyId}/rooms.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $roomId
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function sendMessageToRoom($companyId, $roomId, array $body): array
    {
        return $this->requestJson(
            'post',
            "api/messages/v3/{$companyId}/rooms/{$roomId}/stories.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $roomId
     * @param int|string $userId
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function updateRoomSettings(
        $companyId,
        $roomId,
        $userId,
        array $body
    ): array {
        return $this->requestJson(
            'put',
            "api/messages/v3/{$companyId}/rooms/{$roomId}/users/{$userId}.json",
            ['json' => $body]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $roomId
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function updateRoomMetadata($companyId, $roomId, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/messages/v3/{$companyId}/rooms/{$roomId}.json",
            ['json' => ['metadata' => $body]]
        );
    }
}
