<?php

namespace DigitalMarketingFramework\Distributor\Pardot\Route;

use DigitalMarketingFramework\Core\Integration\IntegrationInfo;
use DigitalMarketingFramework\Core\SchemaDocument\FieldDefinition\FieldDefinition;
use DigitalMarketingFramework\Core\SchemaDocument\Schema\BooleanSchema;
use DigitalMarketingFramework\Core\SchemaDocument\Schema\ContainerSchema;
use DigitalMarketingFramework\Core\SchemaDocument\Schema\SchemaInterface;
use DigitalMarketingFramework\Distributor\Request\Route\RequestOutboundRoute;

class PardotOutboundRoute extends RequestOutboundRoute
{
    protected const COOKIE_IGNORE_VISITOR = 'visitor_id_ignore';

    protected const REGEXP_COOKIE_VISITOR = 'visitor_id[0-9]+(-hash)?';

    protected const KEY_KIOSK_MODE = 'kioskMode';

    protected const DEFAULT_KIOSK_MODE = false;

    public static function getLabel(): ?string
    {
        return 'Pardot Form Handler';
    }

    public static function getDefaultIntegrationInfo(): IntegrationInfo
    {
        return new IntegrationInfo('pardot');
    }

    protected function getMethod(): string
    {
        return 'POST';
    }

    protected function getCookieConfig(): array
    {
        if ($this->getConfig(static::KEY_KIOSK_MODE)) {
            return [];
        }

        if ($this->context->getCookie(static::COOKIE_IGNORE_VISITOR)) {
            return [
                static::COOKIE_IGNORE_VISITOR => static::KEYWORD_PASSTHROUGH,
            ];
        }

        return [
            static::COOKIE_IGNORE_VISITOR => static::KEYWORD_PASSTHROUGH,
            static::REGEXP_COOKIE_VISITOR => static::KEYWORD_PASSTHROUGH,
        ];
    }

    protected function getHeaderConfig(): array
    {
        return [
            'User-Agent' => static::KEYWORD_PASSTHROUGH,
        ];
    }

    public static function getDefaultFields(): array
    {
        return [
            new FieldDefinition('source', type: FieldDefinition::TYPE_STRING, label: 'Source', multiValue: false, required: false),
            new FieldDefinition('salutation', type: FieldDefinition::TYPE_STRING, label: 'Salutation', multiValue: false, required: false),
            new FieldDefinition('first_name', type: FieldDefinition::TYPE_STRING, label: 'First Name', multiValue: false, required: false),
            new FieldDefinition('last_name', type: FieldDefinition::TYPE_STRING, label: 'Last Name', multiValue: false, required: false),
            new FieldDefinition('email', type: FieldDefinition::TYPE_STRING, label: 'Email', multiValue: false, required: true),
            new FieldDefinition('phone', type: FieldDefinition::TYPE_STRING, label: 'Phone', multiValue: false, required: false),
            new FieldDefinition('fax', type: FieldDefinition::TYPE_STRING, label: 'Fax', multiValue: false, required: false),

            new FieldDefinition('company', type: FieldDefinition::TYPE_STRING, label: 'Company', multiValue: false, required: true),
            new FieldDefinition('industry', type: FieldDefinition::TYPE_STRING, label: 'Industry', multiValue: false, required: false),
            new FieldDefinition('department', type: FieldDefinition::TYPE_STRING, label: 'Department', multiValue: false, required: false),
            new FieldDefinition('job_title', type: FieldDefinition::TYPE_STRING, label: 'Job Title', multiValue: false, required: false),
            new FieldDefinition('website', type: FieldDefinition::TYPE_STRING, label: 'Website', multiValue: false, required: false),
            new FieldDefinition('annual_revenue', type: FieldDefinition::TYPE_STRING, label: 'Annual Revenue', multiValue: false, required: false),
            new FieldDefinition('years_in_business', type: FieldDefinition::TYPE_STRING, label: 'Years in Business', multiValue: false, required: false),
            new FieldDefinition('employees', type: FieldDefinition::TYPE_STRING, label: 'Employees', multiValue: false, required: false),

            new FieldDefinition('address_one', type: FieldDefinition::TYPE_STRING, label: 'Address One', multiValue: false, required: false),
            new FieldDefinition('address_two', type: FieldDefinition::TYPE_STRING, label: 'Address Two', multiValue: false, required: false),
            new FieldDefinition('zip', type: FieldDefinition::TYPE_STRING, label: 'ZIP', multiValue: false, required: false),
            new FieldDefinition('city', type: FieldDefinition::TYPE_STRING, label: 'City', multiValue: false, required: false),
            new FieldDefinition('state', type: FieldDefinition::TYPE_STRING, label: 'State', multiValue: false, required: false),
            new FieldDefinition('country', type: FieldDefinition::TYPE_STRING, label: 'Country', multiValue: false, required: false),
            new FieldDefinition('territory', type: FieldDefinition::TYPE_STRING, label: 'Territory', multiValue: false, required: false),

            new FieldDefinition('is_do_not_call', type: FieldDefinition::TYPE_STRING, label: 'Is do not call', multiValue: false, required: false),
            new FieldDefinition('is_do_not_email', type: FieldDefinition::TYPE_STRING, label: 'Is do not email', multiValue: false, required: false),
            new FieldDefinition('opted_out', type: FieldDefinition::TYPE_STRING, label: 'Opted out', multiValue: false, required: false),

            new FieldDefinition('comments', type: FieldDefinition::TYPE_STRING, label: 'Comments', multiValue: false, dedicated: FieldDefinition::DEDICATED_COLLECTOR_FIELD, required: false),
        ];
    }

    public static function getSchema(): SchemaInterface
    {
        /** @var ContainerSchema */
        $schema = parent::getSchema();

        $schema->removeProperty(static::KEY_METHOD);
        $schema->removeProperty(static::KEY_COOKIES);
        $schema->removeProperty(static::KEY_HEADERS);

        $kioskModeSchema = new BooleanSchema(static::DEFAULT_KIOSK_MODE);
        $kioskModeSchema->getRenderingDefinition()->setHint('No (tracking) cookies will be forwarded to the Pardot form handler.');
        $schema->addProperty(static::KEY_KIOSK_MODE, $kioskModeSchema);

        return $schema;
    }
}
