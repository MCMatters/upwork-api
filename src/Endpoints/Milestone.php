<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Milestone
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Milestone extends Endpoint
{
    /**
     * @param int|string $contractReference
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getActive($contractReference): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v3/fp/milestones/statuses/active/contracts/{$contractReference}.json"
        );
    }

    /**
     * @param int $id
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function submissions(int $id, array $query = []): array
    {
        return $this->requestJson(
            'get',
            "api/hr/v3/fp/milestones/{$id}/submissions.json",
            ['query' => $query]
        );
    }

    /**
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function create(array $body): array
    {
        return $this->requestJson(
            'post',
            'api/hr/v3/fp/milestones.json',
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function update(int $id, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v3/fp/milestones/{$id}.json",
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function activate(int $id, array $body = []): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v3/fp/milestones/{$id}/activate.json",
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function approve(int $id, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v3/fp/milestones/{$id}/approve.json",
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function delete(int $id): array
    {
        return $this->requestJson(
            'delete',
            "api/hr/v3/fp/milestones/{$id}.json"
        );
    }
}
