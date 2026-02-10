<?php

namespace DigitalMarketingFramework\Distributor\Pardot\ConfigurationDocument\Migration;

use DigitalMarketingFramework\Distributor\Request\ConfigurationDocument\Migration\DynamicUrlMigration as RequestDynamicUrlMigration;

class DynamicUrlMigration extends RequestDynamicUrlMigration
{
    public function getSourceVersion(): string
    {
        return '1.0.0';
    }

    public function getTargetVersion(): string
    {
        return '1.0.1';
    }

    protected function getIntegrationKeyword(): string
    {
        return 'pardot';
    }

    protected function getRouteKeyword(): string
    {
        return 'pardot';
    }
}
