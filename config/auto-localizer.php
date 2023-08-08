<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Auto Localizer Enabled
    |--------------------------------------------------------------------------
    |
    | This option determines whether the auto localizer functionality is enabled.
    | When set to true, the package will save translations automatically.
    |
    */
    'enabled' => (bool) env('AUTO_LOCALIZER_ENABLED', false),

    /*
    |--------------------------------------------------------------------------
    | Translation Path
    |--------------------------------------------------------------------------
    |
    | This option defines the directory where the translated files will be saved.
    | By default, it uses the 'resources/lang' directory of your Laravel app.
    |
    */
    'path' => resource_path('lang'),

    /*
    |--------------------------------------------------------------------------
    | Production Mode
    |--------------------------------------------------------------------------
    |
    | This option controls whether the auto localizer functionality is active in
    | the production environment. If set to true, the functionality will work
    | in all environments, including production.
    |
    */
    'production' => false,
];