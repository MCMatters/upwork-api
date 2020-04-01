<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Submission
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Submission extends Endpoint
{
    /**
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function create(array $body): array
    {
        return $this->requestJson(
            'post',
            'api/hr/v3/fp/submissions.json',
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function approve(int $id, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v3/fp/submissions/{$id}/approve.json",
            ['json' => $body]
        );
    }

    /**
     * @param int $id
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function reject(int $id, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v3/fp/submissions/{$id}/reject.json",
            ['json' => $body]
        );
    }
}
