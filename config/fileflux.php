<?php

return [

    /**
     * The disk where the files are stored
     */
    'disk' => env('FILE_FLUX_DISK', 'local'),

    /**
     * The project name
     */
    'project' => env('FILE_FLUX_PROJECT', 'my-project-id'),

    /**
     * The webhook url
     */
    'webhook' => env('FILE_FLUX_WEBHOOK', 'https://webhook.site/'),
];