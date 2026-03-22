<?php

namespace Opblaasmaatje\Steam;

use Illuminate\Support\Facades\Config;
use Opblaasmaatje\Steam\Resources\User;
use Saloon\Http\Connector;

class SteamConnector extends Connector
{
    public function __construct(
        protected string $apiKey,
    ) {
        //
    }

    public function user(): User
    {
        return new User($this);
    }

    public function resolveBaseUrl(): string
    {
        return Config::string('steam-web-saloon.base-url');
    }

    protected function defaultQuery(): array
    {
        return [
            'key' => $this->apiKey,
        ];
    }

    protected function defaultHeaders(): array
    {
        return [
            'Content-Type' => 'application/json',
        ];
    }
}
