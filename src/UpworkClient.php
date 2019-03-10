<?php

declare(strict_types = 1);

namespace McMatters\UpworkApi;

use McMatters\UpworkApi\Endpoints\{
    BillingReport, ClientApplication, ClientOffer, Company, CompanyActivity,
    Contract, EarningReport, Engagement, EngagementActivity, FinancialReport,
    FreelanceOffer, FreelancerApplication, Job, Message, Metadata, Milestone,
    Payment, Profile, Report, Snapshot, Submission, Team, TeamActivity, User,
    Workday, WorkDiary
};

/**
 * Class UpworkClient
 *
 * @package McMatters\UpworkApi
 */
class UpworkClient
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $secret;

    /**
     * @var string
     */
    protected $consumerKey;

    /**
     * @var string
     */
    protected $consumerSecret;

    /**
     * @var array
     */
    protected $endpoints = [];

    /**
     * UpworkClient constructor.
     *
     * @param string $token
     * @param string $secret
     * @param string $consumerKey
     * @param string $consumerSecret
     */
    public function __construct(
        string $token,
        string $secret,
        string $consumerKey,
        string $consumerSecret
    ) {
        $this->token = $token;
        $this->secret = $secret;
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\BillingReport
     */
    public function billingReport(): BillingReport
    {
        return $this->endpoint(BillingReport::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\ClientApplication
     */
    public function clientApplication(): ClientApplication
    {
        return $this->endpoint(ClientApplication::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\ClientOffer
     */
    public function clientOffer(): ClientOffer
    {
        return $this->endpoint(ClientOffer::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Company
     */
    public function company(): Company
    {
        return $this->endpoint(Company::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\CompanyActivity
     */
    public function companyActivity(): CompanyActivity
    {
        return $this->endpoint(CompanyActivity::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Contract
     */
    public function contract(): Contract
    {
        return $this->endpoint(Contract::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\EarningReport
     */
    public function earningReport(): EarningReport
    {
        return $this->endpoint(EarningReport::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Engagement
     */
    public function engagement(): Engagement
    {
        return $this->endpoint(Engagement::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\EngagementActivity
     */
    public function engagementActivity(): EngagementActivity
    {
        return $this->endpoint(EngagementActivity::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\FinancialReport
     */
    public function financialReport(): FinancialReport
    {
        return $this->endpoint(FinancialReport::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\FreelanceOffer
     */
    public function freelanceOffer(): FreelanceOffer
    {
        return $this->endpoint(FreelanceOffer::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\FreelancerApplication
     */
    public function freelancerApplication(): FreelancerApplication
    {
        return $this->endpoint(FreelancerApplication::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Job
     */
    public function job(): Job
    {
        return $this->endpoint(Job::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Message
     */
    public function message(): Message
    {
        return $this->endpoint(Message::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Metadata
     */
    public function metadata(): Metadata
    {
        return $this->endpoint(Metadata::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Milestone
     */
    public function milestone(): Milestone
    {
        return $this->endpoint(Milestone::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Payment
     */
    public function payment(): Payment
    {
        return $this->endpoint(Payment::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Profile
     */
    public function profile(): Profile
    {
        return $this->endpoint(Profile::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Report
     */
    public function report(): Report
    {
        return $this->endpoint(Report::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Snapshot
     */
    public function snapshot(): Snapshot
    {
        return $this->endpoint(Snapshot::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Submission
     */
    public function submission(): Submission
    {
        return $this->endpoint(Submission::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Team
     */
    public function team(): Team
    {
        return $this->endpoint(Team::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\TeamActivity
     */
    public function teamActivity(): TeamActivity
    {
        return $this->endpoint(TeamActivity::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\User
     */
    public function user(): User
    {
        return $this->endpoint(User::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\Workday
     */
    public function workday(): Workday
    {
        return $this->endpoint(Workday::class);
    }

    /**
     * @return \McMatters\UpworkApi\Endpoints\WorkDiary
     */
    public function workDiary(): WorkDiary
    {
        return $this->endpoint(WorkDiary::class);
    }

    /**
     * @param string $class
     *
     * @return mixed
     */
    protected function endpoint(string $class)
    {
        if (!isset($this->endpoints[$class])) {
            $this->endpoints[$class] = new $class(
                $this->token,
                $this->secret,
                $this->consumerKey,
                $this->consumerSecret
            );
        }

        return $this->endpoints[$class];
    }
}
