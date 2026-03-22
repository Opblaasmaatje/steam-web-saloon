<?php

namespace Opblaasmaatje\Steam\Data;

use Illuminate\Support\Carbon;
use Opblaasmaatje\Steam\Data\Enums\CommunityVisibilityState;
use Opblaasmaatje\Steam\Data\Enums\Country;
use Opblaasmaatje\Steam\Data\Enums\PersonaState;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class PlayerSummery extends Data
{
    public function __construct(
        public readonly int $steamid,
        public readonly string $personaname,
        public readonly Optional|CommunityVisibilityState $communityvisibilitystate,
        public readonly Optional|int $profilestate,
        public readonly Optional|bool $commentpermission,
        public readonly Optional|string $profileurl,
        public readonly Optional|string $avatar,
        public readonly Optional|string $avatarmedium,
        public readonly Optional|string $avatarfull,
        public readonly Optional|string $avatarhash,
        #[WithCast(DateTimeInterfaceCast::class, 'U')]
        public readonly Carbon $lastlogoff,
        public readonly PersonaState $personastate,
        public readonly Optional|string $realname,
        public readonly Optional|string $primaryclanid,
        #[WithCast(DateTimeInterfaceCast::class, 'U')]
        public readonly Carbon $timecreated,
        public readonly Optional|string $gameextrainfo,
        public readonly Optional|string $gameid,
        public readonly Optional|Country $loccountrycode,
    ) {
        //
    }
}
