<?php

namespace Opblaasmaatje\Steam;

use Illuminate\Support\Facades\Config;
use Opblaasmaatje\Steam\Exceptions\InvalidConfigurationException;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class SteamServiceProvider extends PackageServiceProvider
{
    public function packageBooted(): void
    {
        $this->app->singleton(SteamConnector::class, function () {
            if (! Config::has('steam-web-saloon.api-key')) {
                throw new InvalidConfigurationException('Add steam API key to config.');
            }

            return new SteamConnector(Config::string('steam-web-saloon.api-key'));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package->name('steam-web-saloon')->hasConfigFile();
    }
}
