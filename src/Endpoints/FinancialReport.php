<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

/**
 * Class FinancialReport
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class FinancialReport extends Endpoint
{
    /**
     * @param int|string $accountingEntityReference
     * @param array $query
     *
     * @return array
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\JsonDecodingException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getByAccount(
        $accountingEntityReference,
        array $query
    ): array {
        return $this->requestJson(
            'get',
            "gds/finreports/v2/financial_accounts/{$accountingEntityReference}",
            ['query' => $query]
        );
    }
}
