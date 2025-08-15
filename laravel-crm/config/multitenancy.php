<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tenant Identification
    |--------------------------------------------------------------------------
    | Define how tenants are identified in the application.
    | Options: 'subdomain', 'domain', 'path', 'header'
    */
    'tenant_identification' => 'subdomain',

    /*
    |--------------------------------------------------------------------------
    | Database Connection Strategy
    |--------------------------------------------------------------------------
    | Define how each tenant's database connection is handled.
    | Options: 'separate_databases', 'single_database', 'schema_per_tenant'
    */
    'database_strategy' => 'separate_databases',

    /*
    |--------------------------------------------------------------------------
    | Tenant Database Connection Template
    |--------------------------------------------------------------------------
    | Used when 'separate_databases' strategy is selected.
    | The {tenant_id} placeholder will be replaced with the actual tenant ID.
    */
    'database_connection_template' => [
        'driver' => 'mysql',
        'host' => env('DB_HOST', '127.0.0.1'),
        'port' => env('DB_PORT', '3306'),
        'database' => 'tenant_{tenant_id}',
        'username' => env('DB_USERNAME', 'root'),
        'password' => env('DB_PASSWORD', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => true,
        'engine' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Tenant-specific Behaviors
    |--------------------------------------------------------------------------
    | Define any tenant-specific configurations or service providers.
    */
    'tenant_behaviors' => [
        'storage_path' => storage_path('tenants/{tenant_id}'),
        'cache_prefix' => 'tenant_{tenant_id}_',
    ],

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    | Middleware to run for tenant identification and scoping.
    */
    'middleware' => [
        'tenant_identification' => [
            App\Http\Middleware\IdentifyTenant::class,
        ],
    ],
];

