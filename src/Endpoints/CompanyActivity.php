<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi\Endpoints;

use McMatters\Ticl\Http\Response;

/**
 * Class CompanyActivity
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class CompanyActivity extends Endpoint
{
    /**
     * @param int|string $companyId
     * @param string $data
     *
     * @return \McMatters\Ticl\Http\Response
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function updateBatch($companyId, string $data): Response
    {
        return $this->request(
            'put',
            "api/otask/v1/tasks/companies/{$companyId}/tasks/batch.json",
            ['json' => ['data' => $data]]
        );
    }
}
