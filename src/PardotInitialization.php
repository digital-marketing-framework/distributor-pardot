<?php

namespace DigitalMarketingFramework\Distributor\Pardot;

use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Registry\Plugin\PluginRegistryInterface;
use DigitalMarketingFramework\Distributor\Core\Route\RouteInterface;
use DigitalMarketingFramework\Distributor\Request\RequestInitialization;

class PardotInitialization extends Initialization
{
    const PLUGINS = [
        RouteInterface::class => [
            PardotRoute::class,
        ],
    ];

    public static function initialize(PluginRegistryInterface $registry): void
    {
        RequestInitialization::initialize($registry);
        parent::initialize($registry);
    }
}
