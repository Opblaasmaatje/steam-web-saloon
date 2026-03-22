<?php

namespace Opblaasmaatje\Steam\Facades;

use Illuminate\Support\Facades\Facade;
use Opblaasmaatje\Steam\Resources\User;
use Opblaasmaatje\Steam\SteamConnector;

/**
 * @method static User user()
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
