<?php

namespace Epayco\SdkPhpSiigo\Api;

use Epayco\SdkPhpSiigo\Client;

class AbstractApi
{
    protected const API_VERSION = 'v1';
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    protected function getClient(): Client
    {
        return $this->client;
    }
}