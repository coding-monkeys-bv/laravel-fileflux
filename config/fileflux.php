<?php

use Codingmonkeys\FileFlux\Enums\Audio\Bitrate;
use Codingmonkeys\FileFlux\Enums\Audio\Channel;
use Codingmonkeys\FileFlux\Enums\Audio\Extension;

return [

    /**
     * Set the API key for FileFlux Pro. You can obtain this 
     * by creating one at https://filefluxpro.com
     */
    'api_key' => env('FILEFLUX_API_KEY'),

    /**
     * The project ID for FileFlux Pro. You can obtain this 
     * by creating a project at https://filefluxpro.com
     */
    'project_id' => env('FILEFLUX_PROJECT_ID'),

    'webhook' => [
        'url' => env('FILEFLUX_WEBHOOK_URL'),
        'signature' => env('FILEFLUX_WEBHOOK_SIGNATURE'),
    ],

    /**
     * Target presets allow you to define reusable target configurations that can be referenced
     * by name. Each preset must define a 'target' array containing at least the 'extension'
     * property. Additional properties like 'channels' and 'bitrate' can be included based on
     * your needs. Please read our documentation for more info and the available properties.
     */
    'target_presets' => [
        // 'my-preset' => [
        //     'workflow' => 'ConvertAudioWorkflow',
        //     'target' => [
        //         'extension' => Extension::MP3,
        //         'channels' => Channel::STEREO,
        //         'bitrate' => Bitrate::KBPS_128,
        //         'watermark' => 'source/watermark.mp3', // Enable this if you want to create an extra copy with audio watermark.
        //     ],
        // ],
    ],

];
