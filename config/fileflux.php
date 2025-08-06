<?php

use Codingmonkeys\FileFlux\Enums\Audio\Bitrate;
use Codingmonkeys\FileFlux\Enums\Audio\Channel;
use Codingmonkeys\FileFlux\Enums\Audio\Extension;
use Codingmonkeys\FileFlux\Enums\Images\Format;

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

        // Regular audio

        // 'audio' => [
        //     'workflow' => 'ConvertAudioWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'extension' => Extension::MP3, // MP3, WAV
        //         'channels' => Channel::STEREO, // MONO, STEREO
        //         'bitrate' => Bitrate::KBPS_128, // KBPS_64, KBPS_128, KBPS_192, KBPS_256, KBPS_320
        //     ],
        // ],

        // Watermarked audio

        // 'mono-audio-with-watermark' => [
        //     'workflow' => 'ConvertAudioWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'extension' => Extension::MP3, // MP3, WAV
        //         'channels' => Channel::MONO, // MONO, STEREO
        //         'bitrate' => Bitrate::KBPS_128, // KBPS_64, KBPS_128, KBPS_192, KBPS_256, KBPS_320
        //         'watermark' => 'audio/watermarks/watermark-mono.wav', // path to watermark file
        //     ],
        // ],

        // PDF to Image

        // 'pdf-to-image' => [
        //     'workflow' => 'ConvertPdfWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'quality' => 100, // 0 to 100
        //         'format' => Format::JPG, // JPG, JPEG, PNG, WEBP
        //         'pages' => 'all', // 'all', 'first' or specific page number
        //         'resolution' => 150, // 72 to 600
        //     ],
        // ],

        // Image (basic)

        // 'image' => [
        //     'workflow' => 'ConvertImageWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'folder' => 'images/converted', // Folder to save the converted image
        //         'format' => Format::WEBP, // JPG, JPEG, PNG, WEBP
        //         'quality' => 90, // 0 to 100
        //     ],
        // ],

        // Image (resize)

        // 'image-resize' => [
        //     'workflow' => 'ConvertImageWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'folder' => 'images/converted', // Folder to save the converted image
        //         'format' => Format::WEBP, // JPG, JPEG, PNG, WEBP
        //         'quality' => 90, // 0 to 100 (not applicable for PNG)
        //         'resize' => [
        //             'width' => 800,
        //             'height' => 600,
        //         ],
        //     ],
        // ],

        // Image (crop)

        // 'image-crop' => [
        //     'workflow' => 'ConvertImageWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'folder' => 'images/converted', // Folder to save the converted image
        //         'format' => Format::PNG, // JPG, JPEG, PNG, WEBP
        //         'crop' => [
        //             'mode' => 'cover',
        //             'width' => 800,
        //             'height' => 600,
        //             'position' => 'center', // top, right, bottom, left, center, top-left, top-right, bottom-left, bottom-right
        //         ],
        //     ],
        // ],

        // Image (crop - cover)

        // 'image-crop-cover' => [
        //     'workflow' => 'ConvertImageWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'folder' => 'images/converted', // Folder to save the converted image
        //         'format' => Format::WEBP, // JPG, JPEG, PNG, WEBP
        //         'quality' => 90, // 0 to 100
        //         'crop' => [
        //             'mode' => 'cover',
        //             'width' => 200,
        //             'height' => 200,
        //         ],
        //     ],
        // ],

        // Image (crop - coordinates)

        // 'image-crop-coordinates' => [
        //     'workflow' => 'ConvertImageWorkflow', // Name of the workflow to use
        //     'target' => [
        //         'folder' => 'images/converted', // Folder to save the converted image
        //         'format' => Format::JPG, // JPG, JPEG, PNG, WEBP
        //         'quality' => 90, // 0 to 100
        //         'crop' => [
        //             'mode' => 'crop',
        //             'width' => 200,
        //             'height' => 200,
        //             'x' => 100, // Coordinate from the left of the original image (0 is the leftmost point)
        //             'y' => 100, // Coordinate from the top of the original image (0 is the topmost point)
        //         ],
        //     ],
        // ],

    ],

];
