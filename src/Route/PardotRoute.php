<?php

namespace DigitalMarketingFramework\Distributor\Pardot\Route;

use DigitalMarketingFramework\Core\ConfigurationDocument\SchemaDocument\Schema\ContainerSchema;
use DigitalMarketingFramework\Core\ConfigurationDocument\SchemaDocument\Schema\SchemaInterface;
use DigitalMarketingFramework\Core\DataProcessor\DataProcessor;
use DigitalMarketingFramework\Core\DataProcessor\ValueSource\FieldCollectorValueSource;
use DigitalMarketingFramework\Core\DataProcessor\ValueSource\FieldValueSource;
use DigitalMarketingFramework\Distributor\Request\Route\RequestRoute;

class PardotRoute extends RequestRoute
{
    const DEFAULT_COOKIES = parent::DEFAULT_COOKIES + [
        'visitor_id[0-9]+(-hash)?',
    ];

    const DEFAULT_HEADERS = parent::DEFAULT_HEADERS + [
        'User-Agent' => self::KEYWORD_PASSTHROUGH,
    ];

    public static function getSchema(): SchemaInterface
    {
        /** @var ContainerSchema $schema */
        $schema = parent::getSchema();
        // TODO how to set default fields if there is a custom schema involved?
        // $schema->getProperty('')->getSchema()->setDefaultValue(static::getDefaultFields());
        return $schema;
    }

    protected static function getDefaultFields(): array
    {
        return [
            'source' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'source']),

            'salutation' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'salutation']),
            'first_name' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'first_name']),
            'last_name' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'last_name']),

            'email' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'email']),
            'phone' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'phone']),
            'fax' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'fax']),

            'company' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'company']),
            'industry' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'industry']),
            'department' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'department']),
            'job_title' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'job_title']),
            'website' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'website']),
            'annual_revenue' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'annual_revenue']),
            'years_in_business' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'years_in_business']),
            'employees' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'employees']),

            'address_one' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'address_one']),
            'address_two' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'address_two']),
            'zip' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'zip']),
            'city' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'city']),
            'state' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'state']),
            'country' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'country']),
            'territory' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'territory']),

            'is_do_not_call' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'is_do_not_call']),
            'is_do_not_email' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'is_do_not_email']),
            'opted_out' => DataProcessor::getDefaultValueConfiguration(FieldValueSource::class, null, [FieldValueSource::KEY_FIELD_NAME => 'opted_out']),

            'comments' => DataProcessor::getDefaultValueConfiguration(FieldCollectorValueSource::class),
        ];
    }
}
