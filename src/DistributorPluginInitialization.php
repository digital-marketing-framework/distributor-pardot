<?php

namespace DigitalMarketingFramework\Distributor\Pardot;

use DigitalMarketingFramework\Core\PluginInitialization;
use DigitalMarketingFramework\Distributor\Core\Route\RouteInterface;

class DistributorPluginInitialization extends PluginInitialization
{
    const PLUGINS = [
        RouteInterface::class => [
            PardotRoute::class,
        ],
    ];
}
