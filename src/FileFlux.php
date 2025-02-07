<?php

namespace Codingmonkeys\FileFlux;

use Codingmonkeys\FileFlux\Enums\Workflows\Workflow;
use Codingmonkeys\FileFlux\Exceptions\InvalidPresetException;
use Codingmonkeys\FileFlux\Exceptions\InvalidPropertyException;
use Codingmonkeys\FileFlux\Exceptions\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FileFlux
{
    const API_ENDPOINT = 'https://file-flux.dev1.codingmonkeys.nl/api/v1/tasks';

    protected $project;

    protected $webhook;

    protected $workflow;

    protected $source;

    protected $target;

    protected $preset;

    protected $usesPreset = false;

    public function __construct()
    {
        $this->project = config('file-flux.project_id');
        $this->webhook = config('file-flux.webhook.url') ?? config('app.url').'/file-flux/webhooks';
    }

    public function project($project = null)
    {
        $this->project = $project ?? config('file-flux.project_id');

        return $this;
    }

    public function webhook(?string $url = null)
    {
        $this->webhook = $url ?? config('app.url').'/file-flux/webhooks';

        return $this;
    }

    public function workflow(string $workflow)
    {
        $this->workflow = $workflow;

        return $this;
    }

    public function source(string $source)
    {
        $this->source = $source;

        return $this;
    }

    public function target(string|array $target)
    {
        // When preset is given, the target should be a string.
        if (is_string($target)) {
            $this->target['filename'] = $target;

            return $this;
        }

        $this->target = $target;

        return $this;
    }

    public function preset(string $preset)
    {
        if (! config()->has('file-flux.target_presets.'.$preset)) {
            throw new InvalidPresetException($preset);
        }

        $this->preset = config('file-flux.target_presets.'.$preset);
        $this->usesPreset = true;

        $this->workflow($this->preset['workflow']);
        $this->target($this->preset['target']);

        return $this;
    }

    protected function validate(array $data)
    {
        // Check if rules for the given workflow exists.
        if (! isset(Workflow::rules()[$data['workflow']])) {
            throw new InvalidPropertyException('workflow');
        }

        // Merge base rules with specific workflow rules.
        $rules = array_merge([
            'project_id' => ['required', 'uuid'],
            'workflow' => ['required', 'string', Rule::enum(Workflow::class)],
            'webhook' => ['required', 'url', 'max:1024'],
            'source' => ['required', 'string', 'max:255'],
            'target' => ['required', 'array'],
        ], Workflow::rules()[$data['workflow']]);

        // Validate against the workflow-specific rules
        $validator = Validator::make($data, $rules);

        // Throw exception when validation fails.
        if ($validator->fails()) {
            throw new ValidationException($validator->errors()->toArray());
        }

        return $validator->validated();
    }

    public function convert()
    {
        // Setup data.
        $data = [
            'project_id' => $this->project,
            'webhook' => $this->webhook,
            'workflow' => $this->workflow,
            'source' => $this->source,
            'target' => $this->target,
        ];

        // Validate data to prevent unnecessary API calls.
        $data = $this->validate($data);

        // Create task via API call.
        return Http::withToken(config('file-flux.api_key'))
            ->retry(3)
            ->acceptJson()
            ->post(self::API_ENDPOINT, $data);
    }
}
