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

$consumerKey = 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX';
$consumerSecret ='XXXXXXXXXXXXXXXX';

$authClient = new \McMatters\UpworkApi\UpworkAuthClient($consumerKey, $consumerSecret);
$tokens = $authClient->authorize();

$token = $tokens['oauth_token'];
$secret = $tokens['oauth_token_secret'];

$client = new \McMatters\UpworkApi\UpworkClient($token, $secret, $consumerKey, $consumerSecret);

$jobs = $client->job()->search(['q' => 'Laravel', 'job_status' => 'open']);
$job = $client->job()->getJobProfile($jobs['jobs'][0]['id']);
```
