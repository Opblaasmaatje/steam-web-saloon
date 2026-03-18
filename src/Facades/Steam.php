<?php

namespace Opblaasmaatje\Steam\Facades;

use Illuminate\Support\Facades\Facade;
use Opblaasmaatje\Steam\Resources\SteamNews;
use Opblaasmaatje\Steam\SteamConnector;

/**
 * @method static SteamNews steamNews()
 *
 * @see SteamConnector
 */
class Steam extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return SteamConnector::class;
    }
}
