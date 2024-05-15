<?php

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    private HttpClient $client;
    private string $siigoAccessKey;
    private string $username;
    private ?string $token = null;
    private array $headers = [];

    public function __construct(string $username, string $siigoAccessKey, string $token = null)
    {
        $this->client = new HttpClient([
            'base_uri' => 'https://api.siigo.com/',
        ]);

        $this->siigoAccessKey = $siigoAccessKey;
        $this->username = $username;
        $this->token = $token;
        $this->headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Partner-Id' => 'facturacionePayco',
        ];
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $data
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function request(string $method, string $url, array $data = []): ResponseInterface
    {
        try {
            if ($this->getToken()) {
                $this->headers['Authorization'] = 'Bearer ' . $this->getToken();
            } else {
                $this->login();
            }

            return $this->client->request($method, $url, [
                'json' => $data,
                'headers' => $this->headers,
            ]);
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                $this->login();
                return $this->client->request($method, $url, [
                    'json' => $data,
                    'headers' => $this->headers,
                ]);
            }

            throw $e;
        }
    }

    /**
     * @return string
     * @throws GuzzleException
     */
    public function login(): string
    {
        $body = [
            'username' => $this->username,
            'access_key' => $this->siigoAccessKey,
        ];
        $response = $this->client->request('POST', 'auth', [
            'json' => $body,
            'headers' => $this->headers,
        ]);
        $this->setToken(json_decode($response->getBody()->getContents(), true)['access_token']);
        $this->headers['Authorization'] = 'Bearer ' . $this->getToken();
        return $this->getToken();
    }

    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }
}