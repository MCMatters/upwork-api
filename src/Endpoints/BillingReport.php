<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class BillingReport
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class BillingReport extends Endpoint
{
    /**
     * @param int|string $providerReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByFreelancer($providerReference, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/finreports/v2/providers/{$providerReference}/billings",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $buyerTeamReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByBuyersTeam($buyerTeamReference, array $query): array
    {
        return $this->requestJson(
            'get',
            "gds/finreports/v2/buyer_teams/{$buyerTeamReference}/billings",
            ['query' => $query]
        );
    }

    /**
     * @param int|string $buyerCompanyReference
     * @param array $query
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByBuyersCompany(
        $buyerCompanyReference,
        array $query
    ): array {
        return $this->requestJson(
            'get',
            "gds/finreports/v2/buyer_companies/{$buyerCompanyReference}/billings",
            ['query' => $query]
        );
    }
}
