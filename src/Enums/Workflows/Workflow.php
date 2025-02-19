<?php

namespace Codingmonkeys\FileFlux\Enums\Workflows;

use Codingmonkeys\FileFlux\Enums\Audio\Bitrate;
use Codingmonkeys\FileFlux\Enums\Audio\Channel;
use Codingmonkeys\FileFlux\Enums\Audio\Extension;
use Illuminate\Validation\Rule;

enum Workflow: string
{
    case CONVERT_AUDIO_WORKFLOW = 'ConvertAudioWorkflow';

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
        ];
    }
}
