<?php

namespace DigitalMarketingFramework\Distributor\Pardot;

use DigitalMarketingFramework\Core\PluginInitialization;
use DigitalMarketingFramework\Distributor\Core\Route\RouteInterface;
use DigitalMarketingFramework\Distributor\Pardot\Route\PardotRoute;

class DistributorPluginInitialization extends PluginInitialization
{
    const PLUGINS = [
        RouteInterface::class => [
            PardotRoute::class,
        ],
    ];
}
