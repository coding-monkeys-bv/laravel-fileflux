<?php

return [

    /**
     * Set the API key for File Flux Pro. You can obtain this by creating one
     * at https://filefluxpro.com
     */
    'api_key' => env('FILE_FLUX_API_KEY'),

    /**
     * The project ID for File Flux Pro. You can obtain this by creating a project
     * at https://filefluxpro.com
     */
    'project_id' => env('FILE_FLUX_PROJECT_ID'),

    'webhook' => [
        'signature' => env('FILE_FLUX_WEBHOOK_SIGNATURE'),
    ],
];
