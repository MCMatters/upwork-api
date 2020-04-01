<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class Payment
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Payment extends Endpoint
{
    /**
     * @param int|string $teamReference
     * @param array $body
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function make($teamReference, array $body): array
    {
        return $this->requestJson(
            'post',
            "api/hr/v2/teams/{$teamReference}/adjustments.json",
            ['json' => $body]
        );
    }
}
