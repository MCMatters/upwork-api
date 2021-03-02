<?php

declare(strict_types=1);

namespace McMatters\UpworkApi\Endpoints;

use function explode, header, readline, trim;

use const false, null, true;

/**
 * Class Authorization
 *
 * @package McMatters\UpworkApi\Endpoints
 */
class Authorization extends Endpoint
{
    /**
     * Authorization constructor.
     *
     * @param string $consumerKey
     * @param string $consumerSecret
     */
    public function __construct(
        string $consumerKey,
        string $consumerSecret
    ) {
        $this->consumerKey = $consumerKey;
        $this->consumerSecret = $consumerSecret;
        $this->setHttpClient();
    }

    /**
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getRequestToken(): array
    {
        return $this->parseStringResponse(
            $this->request('post', 'api/auth/v1/oauth/token/request')->getBody()
        );
    }

    /**
     * @param string|null $token
     * @param string|null $callback
     *
     * @return string
     */
    public function getVerifierUrl(
        string $token = null,
        string $callback = null
    ): string {
        if (null === $token) {
            $tokens = $this->getRequestToken();

            $token = $tokens['oauth_token'];
        }

        $url = $this->httpClient->getFullUrl('services/api/auth')."?oauth_token={$token}";

        if (null !== $callback) {
            $url .= "&oauth_callback={$callback}";
        }

        return $url;
    }

    /**
     * @param string|null $token
     * @param bool $inConsole
     * @param string|null $callback
     *
     * @return string
     *
     * @throws \InvalidArgumentException
     */
    public function getVerifier(
        string $token = null,
        bool $inConsole = false,
        string $callback = null
    ): string {
        $url = $this->getVerifierUrl($token, $callback);

        if ($inConsole) {
            return trim(
                readline(
                    "Please visit\n{$url}\nand paste here 'oauth_verifier' from url \n"
                )
            );
        }

        header("Location: {$url}");
        exit;
    }

    /**
     * @param string $token
     * @param string $secret
     * @param string $verifier
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function getAccessToken(
        string $token,
        string $secret,
        string $verifier
    ): array {
        $this->token = $token;
        $this->secret = $secret;

        return $this->parseStringResponse(
            $this->request(
                'post',
                'api/auth/v1/oauth/token/access',
                ['headers' => ['oauth_verifier' => $verifier]]
            )->getBody()
        );
    }

    /**
     * @param bool $inConsole
     * @param string|null $callback
     *
     * @return array
     *
     * @throws \InvalidArgumentException
     * @throws \McMatters\Ticl\Exceptions\RequestException
     */
    public function authorize(bool $inConsole = true, string $callback = null): array
    {
        $tokens = $this->getRequestToken();

        $verifier = $this->getVerifier($tokens['oauth_token'], $inConsole, $callback);

        return $this->getAccessToken(
            $tokens['oauth_token'],
            $tokens['oauth_token_secret'],
            $verifier
        );
    }

    /**
     * @param string $response
     *
     * @return array
     */
    protected function parseStringResponse(string $response): array
    {
        $body = [];

        foreach (explode('&', $response) as $item) {
            [$key, $value] = explode('=', $item);
            $body[$key] = $value;
        }

        return $body;
    }
}
