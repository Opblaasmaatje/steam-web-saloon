<?php

namespace Opblaasmaatje\Steam\Resources;

use Opblaasmaatje\Steam\Resources\Requests\GetPlayerSummaries;
use Opblaasmaatje\Steam\SteamConnector;
use Saloon\Http\Response;

class User
{
    public function __construct(
        protected SteamConnector $connector
    ) {
        //
    }

    /**
     * @param  int[]  $ids
     */
    public function getPlayerSummaries(array $ids): Response
    {
        return $this->connector->send(
            new GetPlayerSummaries($ids)
        );
    }
}
