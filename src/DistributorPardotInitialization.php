<?php

namespace DigitalMarketingFramework\Distributor\Pardot;

use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Registry\RegistryDomain;
use DigitalMarketingFramework\Distributor\Core\Route\RouteInterface;
use DigitalMarketingFramework\Distributor\Pardot\Route\PardotRoute;

class DistributorPardotInitialization extends Initialization
{
    const PLUGINS = [
        RegistryDomain::DISTRIBUTOR => [
            RouteInterface::class => [
                PardotRoute::class,
            ],
        ],
    ];

    protected const SCHEMA_MIGRATIONS = [];

    public function __construct()
    {
        parent::__construct('distributor-pardot', '1.0.0');
    }
}