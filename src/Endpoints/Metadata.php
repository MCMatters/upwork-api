<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Metadata
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Metadata extends Endpoint
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function categories(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v2/metadata/categories.json',
            ['query' => $query]
        );
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function skills(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v1/metadata/skills.json',
            ['query' => $query]
        );
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function regions(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v1/metadata/regions.json',
            ['query' => $query]
        );
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function tests(array $query = []): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v1/metadata/tests.json',
            ['query' => $query]
        );
    }

    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function reasons(array $query): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v1/metadata/reasons.json',
            ['query' => $query]
        );
    }
}
