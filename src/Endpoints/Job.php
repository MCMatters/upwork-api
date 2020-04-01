<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Job
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Job extends Endpoint
{
    /**
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function search(array $query): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v2/search/jobs.json',
            ['query' => $query]
        );
    }

    /**
     * @param string $buyerTeamReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function list(string $buyerTeamReference, array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/hr/v2/jobs.json',
            [
                'query' => [
                        'buyer_team__reference' => $buyerTeamReference,
                ] + $query,
            ]
        );
    }

    /**
     * @param string $jobKey
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get(string $jobKey): array
    {
        return $this->requestJson('get', "api/hr/v2/jobs/{$jobKey}.json");
    }

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
            'api/hr/v2/jobs.json',
            ['json' => $body]
        );
    }

    /**
     * @param string $jobKey
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function update(string $jobKey, array $body): array
    {
        return $this->requestJson(
            'put',
            "api/hr/v2/jobs/{$jobKey}.json",
            ['json' => $body]
        );
    }

    /**
     * @param string $jobKey
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function cancel(string $jobKey, array $query): array
    {
        return $this->requestJson(
            'delete',
            "api/hr/v2/jobs/{$jobKey}.json",
            ['query' => $query]
        );
    }

    /**
     * @param string $jobKey
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getJobProfile(string $jobKey): array
    {
        return $this->requestJson('get', "api/profiles/v1/jobs/{$jobKey}.json");
    }

    /**
     * @param string $jobKey
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function invite(string $jobKey, array $body): array
    {
        return $this->requestJson(
            'post',
            "api/hr/v1/jobs/{$jobKey}/candidates.json",
            ['json' => $body]
        );
    }
}
