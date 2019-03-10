<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Profile
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Profile extends Endpoint
{
    /**
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function search(array $query): array
    {
        return $this->requestJson(
            'get',
            'api/profiles/v2/search/providers.json',
            ['query' => $query]
        );
    }

    /**
     * @param string $profileKey
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getBrief(string $profileKey): array
    {
        return $this->requestJson(
            'get',
            "api/profiles/v1/providers/{$profileKey}/brief.json"
        );
    }

    /**
     * @param string $profileKey
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getProfileDetails(string $profileKey): array
    {
        return $this->requestJson(
            'get',
            "api/profiles/v1/providers/{$profileKey}.json"
        );
    }
}
