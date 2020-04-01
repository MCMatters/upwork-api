<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function implode, is_array;

/**
 * Class TeamActivity
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class TeamActivity extends Endpoint
{
    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list($companyId, $teamId, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param array|string $code
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByCode($companyId, $teamId, $code, array $query = []): array
    {
        $code = is_array($code) ? implode(';', $code) : $code;

        return $this->requestJson(
            'get',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks/{$code}.json",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param string $code
     * @param string $description
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function create(
        $companyId,
        $teamId,
        string $code,
        string $description,
        array $data = []
    ): array {
        return $this->requestJson(
            'post',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks.json",
            ['json' => ['code' => $code, 'description' => $description] + $data]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param string $code
     * @param string $description
     * @param array $data
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function update(
        $companyId,
        $teamId,
        string $code,
        string $description,
        array $data = []
    ): array {
        return $this->requestJson(
            'put',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/tasks/{$code}.json",
            ['json' => ['description' => $description] + $data]
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param string $code
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function archive($companyId, $teamId, string $code): array
    {
        return $this->requestJson(
            'put',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/archive/{$code}.json"
        );
    }

    /**
     * @param int|string $companyId
     * @param int|string $teamId
     * @param string $code
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function unarchive($companyId, $teamId, string $code): array
    {
        return $this->requestJson(
            'put',
            "api/otask/v1/tasks/companies/{$companyId}/teams/{$teamId}/unarchive/{$code}.json"
        );
    }
}
