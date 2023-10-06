<?php

namespace DigitalMarketingFramework\Distributor\Pardot\Route;

use DigitalMarketingFramework\Core\DataProcessor\DataProcessor;
use DigitalMarketingFramework\Distributor\Request\Route\RequestRoute;

class PardotRoute extends RequestRoute
{
    protected const DEFAULT_COOKIES = parent::DEFAULT_COOKIES + [
        'visitor_id[0-9]+(-hash)?' => self::KEYWORD_PASSTHROUGH,
    ];

    protected const DEFAULT_HEADERS = parent::DEFAULT_HEADERS + [
        'User-Agent' => self::KEYWORD_PASSTHROUGH,
    ];

    protected static function getDefaultFields(): array
    {
        return [
            'source' => DataProcessor::valueSchemaDefaultValueField('source'),

            'salutation' => DataProcessor::valueSchemaDefaultValueField('salutation'),
            'first_name' => DataProcessor::valueSchemaDefaultValueField('first_name'),
            'last_name' => DataProcessor::valueSchemaDefaultValueField('last_name'),

            'email' => DataProcessor::valueSchemaDefaultValueField('email'),
            'phone' => DataProcessor::valueSchemaDefaultValueField('phone'),
            'fax' => DataProcessor::valueSchemaDefaultValueField('fax'),

            'company' => DataProcessor::valueSchemaDefaultValueField('company'),
            'industry' => DataProcessor::valueSchemaDefaultValueField('industry'),
            'department' => DataProcessor::valueSchemaDefaultValueField('department'),
            'job_title' => DataProcessor::valueSchemaDefaultValueField('job_title'),
            'website' => DataProcessor::valueSchemaDefaultValueField('website'),
            'annual_revenue' => DataProcessor::valueSchemaDefaultValueField('annual_revenue'),
            'years_in_business' => DataProcessor::valueSchemaDefaultValueField('years_in_business'),
            'employees' => DataProcessor::valueSchemaDefaultValueField('employees'),

            'address_one' => DataProcessor::valueSchemaDefaultValueField('address_one'),
            'address_two' => DataProcessor::valueSchemaDefaultValueField('address_two'),
            'zip' => DataProcessor::valueSchemaDefaultValueField('zip'),
            'city' => DataProcessor::valueSchemaDefaultValueField('city'),
            'state' => DataProcessor::valueSchemaDefaultValueField('state'),
            'country' => DataProcessor::valueSchemaDefaultValueField('country'),
            'territory' => DataProcessor::valueSchemaDefaultValueField('territory'),

            'is_do_not_call' => DataProcessor::valueSchemaDefaultValueField('is_do_not_call'),
            'is_do_not_email' => DataProcessor::valueSchemaDefaultValueField('is_do_not_email'),
            'opted_out' => DataProcessor::valueSchemaDefaultValueField('opted_out'),

            'comments' => DataProcessor::valueSchemaDefaultValueFieldCollector(),
        ];
    }
}
