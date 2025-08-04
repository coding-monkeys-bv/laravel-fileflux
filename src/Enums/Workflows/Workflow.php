<?php

namespace Codingmonkeys\FileFlux\Enums\Workflows;

use Codingmonkeys\FileFlux\Enums\Audio\Bitrate;
use Codingmonkeys\FileFlux\Enums\Audio\Channel;
use Codingmonkeys\FileFlux\Enums\Audio\Extension;
use Codingmonkeys\FileFlux\Enums\Images\Format;
use Illuminate\Validation\Rule;

enum Workflow: string
{
    case CONVERT_AUDIO_WORKFLOW = 'ConvertAudioWorkflow';
    case CONVERT_PDF_WORKFLOW = 'ConvertPdfWorkflow';

    public static function rules(): array
    {
        return [
            self::CONVERT_AUDIO_WORKFLOW->value => [
                'source' => ['required', 'string', 'max:255'],
                'target.channels' => ['required', Rule::enum(Channel::class)],
                'target.extension' => ['required', Rule::enum(Extension::class)],
                'target.bitrate' => ['required', Rule::enum(Bitrate::class)],
                'target.filename' => ['required', 'string', 'max:100'],
                'target.watermark' => ['sometimes', 'string', 'max:100'],
            ],

            self::CONVERT_PDF_WORKFLOW->value => [
                'source' => ['required', 'string', 'max:255'],
                'target.quality' => ['required', 'integer', 'min:1', 'max:100'],
                'target.format' => ['required', Rule::enum(Format::class)],
                'target.folder' => ['required', 'string', 'max:100'],
                'target.pages' => ['required', 'string', 'max:100'],
                'target.resolution' => ['required', 'integer', 'min:72', 'max:600'],
            ],
        ];
    }
}
