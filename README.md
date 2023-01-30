## Upwork API PHP Client

### Installation

```bash
composer require mcmatters/upwork-api
```

### Usage

```php
<?php

declare(strict_types=1);

require './vendor/autoload.php';

$clientId = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$clientSecret ='XXXXXXXXXXXXXXXX';
$redirectUrl = 'https://example.com/upwork'

$authClient = new \McMatters\UpworkApi\UpworkAuthClient($clientId, $clientSecret);
$code = $authClient->authorize($redirectUrl, true);
$accessToken = $authClient->accessToken($redirectUrl, $code);

$client = new \McMatters\UpworkApi\UpworkClient($clientId, $clientSecret, $accessToken);

$jobs = $client->job()->search(['q' => 'Laravel', 'job_status' => 'open']);
$job = $client->job()->getJobProfile($jobs['jobs'][0]['id']);
```
