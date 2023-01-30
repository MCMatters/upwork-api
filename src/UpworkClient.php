<?php

declare(strict_types=1);

namespace McMatters\UpworkApi;

use McMatters\UpworkApi\Endpoints\BillingReport;
use McMatters\UpworkApi\Endpoints\ClientApplication;
use McMatters\UpworkApi\Endpoints\ClientOffer;
use McMatters\UpworkApi\Endpoints\Company;
use McMatters\UpworkApi\Endpoints\CompanyActivity;
use McMatters\UpworkApi\Endpoints\Contract;
use McMatters\UpworkApi\Endpoints\EarningReport;
use McMatters\UpworkApi\Endpoints\Engagement;
use McMatters\UpworkApi\Endpoints\EngagementActivity;
use McMatters\UpworkApi\Endpoints\FinancialReport;
use McMatters\UpworkApi\Endpoints\FreelanceOffer;
use McMatters\UpworkApi\Endpoints\FreelancerApplication;
use McMatters\UpworkApi\Endpoints\Job;
use McMatters\UpworkApi\Endpoints\Message;
use McMatters\UpworkApi\Endpoints\Metadata;
use McMatters\UpworkApi\Endpoints\Milestone;
use McMatters\UpworkApi\Endpoints\Payment;
use McMatters\UpworkApi\Endpoints\Profile;
use McMatters\UpworkApi\Endpoints\Report;
use McMatters\UpworkApi\Endpoints\Snapshot;
use McMatters\UpworkApi\Endpoints\Submission;
use McMatters\UpworkApi\Endpoints\Team;
use McMatters\UpworkApi\Endpoints\TeamActivity;
use McMatters\UpworkApi\Endpoints\User;
use McMatters\UpworkApi\Endpoints\Workday;
use McMatters\UpworkApi\Endpoints\WorkDiary;

class UpworkClient
{
    protected string $clientId;

    protected string $clientSecret;

    protected string $accessToken;

    protected array $endpoints = [];

    public function __construct(
        string $clientId,
        string $clientSecret,
        string $accessToken
    ) {
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
    }

    public function billingReport(): BillingReport
    {
        return $this->endpoint(BillingReport::class);
    }

    public function clientApplication(): ClientApplication
    {
        return $this->endpoint(ClientApplication::class);
    }

    public function clientOffer(): ClientOffer
    {
        return $this->endpoint(ClientOffer::class);
    }

    public function company(): Company
    {
        return $this->endpoint(Company::class);
    }

    public function companyActivity(): CompanyActivity
    {
        return $this->endpoint(CompanyActivity::class);
    }

    public function contract(): Contract
    {
        return $this->endpoint(Contract::class);
    }

    public function earningReport(): EarningReport
    {
        return $this->endpoint(EarningReport::class);
    }

    public function engagement(): Engagement
    {
        return $this->endpoint(Engagement::class);
    }

    public function engagementActivity(): EngagementActivity
    {
        return $this->endpoint(EngagementActivity::class);
    }

    public function financialReport(): FinancialReport
    {
        return $this->endpoint(FinancialReport::class);
    }

    public function freelanceOffer(): FreelanceOffer
    {
        return $this->endpoint(FreelanceOffer::class);
    }

    public function freelancerApplication(): FreelancerApplication
    {
        return $this->endpoint(FreelancerApplication::class);
    }

    public function job(): Job
    {
        return $this->endpoint(Job::class);
    }

    public function message(): Message
    {
        return $this->endpoint(Message::class);
    }

    public function metadata(): Metadata
    {
        return $this->endpoint(Metadata::class);
    }

    public function milestone(): Milestone
    {
        return $this->endpoint(Milestone::class);
    }

    public function payment(): Payment
    {
        return $this->endpoint(Payment::class);
    }

    public function profile(): Profile
    {
        return $this->endpoint(Profile::class);
    }

    public function report(): Report
    {
        return $this->endpoint(Report::class);
    }

    public function snapshot(): Snapshot
    {
        return $this->endpoint(Snapshot::class);
    }

    public function submission(): Submission
    {
        return $this->endpoint(Submission::class);
    }

    public function team(): Team
    {
        return $this->endpoint(Team::class);
    }

    public function teamActivity(): TeamActivity
    {
        return $this->endpoint(TeamActivity::class);
    }

    public function user(): User
    {
        return $this->endpoint(User::class);
    }

    public function workday(): Workday
    {
        return $this->endpoint(Workday::class);
    }

    public function workDiary(): WorkDiary
    {
        return $this->endpoint(WorkDiary::class);
    }

    protected function endpoint(string $class)
    {
        if (!isset($this->endpoints[$class])) {
            $this->endpoints[$class] = new $class(
                $this->clientId,
                $this->clientSecret,
                $this->accessToken,
            );
        }

        return $this->endpoints[$class];
    }
}
