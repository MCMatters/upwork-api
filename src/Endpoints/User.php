<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class User
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class User extends Endpoint
{
    /**
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function current(): array
    {
        return $this->requestJson('get', 'api/auth/v1/info.json');
    }

    /**
     * @param int|string $id
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function get($id): array
    {
        return $this->requestJson('get', "api/hr/v2/users/{$id}.json");
    }

    /**
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function roles(): array
    {
        return $this->requestJson('get', 'api/hr/v2/userroles.json');
    }
}
