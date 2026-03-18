<?php

namespace Opblaasmaatje\Steam\Resources\Requests;

use Illuminate\Support\Collection;
use Opblaasmaatje\Steam\Data\PlayerSummery;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

class GetPlayerSummaries extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        /** @var int[] $ids */
        protected array $ids
    ) {
        //
    }

    public function resolveEndpoint(): string
    {
        return 'ISteamUser/GetPlayerSummaries/v0002';
    }

    protected function defaultQuery(): array
    {
        return [
            'steamids' => implode(',', $this->ids),
        ];
    }

    /**
     * @return Collection<int, PlayerSummery>|null
     */
    public function createDtoFromResponse(Response $response): ?Collection
    {
        if ($response->failed()) {
            return null;
        }

        /** @phpstan-ignore-next-line  */
        return PlayerSummery::collect($response->json('response.players', []), Collection::class);
    }
}
