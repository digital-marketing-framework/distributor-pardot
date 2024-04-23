<?php

namespace DigitalMarketingFramework\Distributor\Pardot;

use DigitalMarketingFramework\Core\Initialization;
use DigitalMarketingFramework\Core\Registry\RegistryDomain;
use DigitalMarketingFramework\Distributor\Core\Route\OutboundRouteInterface;
use DigitalMarketingFramework\Distributor\Pardot\Route\PardotOutboundRoute;

class DistributorPardotInitialization extends Initialization
{
    protected const PLUGINS = [
        RegistryDomain::DISTRIBUTOR => [
            OutboundRouteInterface::class => [
                PardotOutboundRoute::class,
            ],
        ],
    ];

    protected const SCHEMA_MIGRATIONS = [];

    public function __construct(string $packageAlias = '')
    {
        parent::__construct('distributor-pardot', '1.0.0', $packageAlias);
    }
}
