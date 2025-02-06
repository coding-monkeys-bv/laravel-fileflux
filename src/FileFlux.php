<?php

namespace Codingmonkeys\FileFlux;

use Illuminate\Support\Facades\Http;

class FileFlux
{
    const API_ENDPOINT = 'https://file-flux.dev1.codingmonkeys.nl/api/v1/tasks';

    protected $project;

    protected $webhook;

    protected $workflow;

    protected $source;

    protected $target;

    protected $targetPreset;

    protected $usingTargetPreset = false;

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

    public function target($config)
    {
        if ($this->usingTargetPreset) {
            if (is_string($config)) {
                $config = ['filename' => $config];
            } else if (! is_array($config)) {
                throw new \InvalidArgumentException("Target configuration must be a string when using a preset.");
            }

            $config = array_merge($this->targetPreset['target'], $config);

        } else {
            if (! is_array($config)) {
                throw new \InvalidArgumentException("Target configuration must be an array when NOT using a preset.");
            }
        }

        $this->validateTargetConfig($config);
        $this->target = $config;

        return $this;
    }

    public function targetPreset(?string $preset = null)
    {
        $this->targetPreset = config('file-flux.target_presets.'.$preset) ?? null;

        $this->usingTargetPreset = $this->targetPreset !== null;

        return $this;
    }

    public function convert()
    {
        // Actual processing logic
        $data = [
            'project_id' => $this->project,
            'webhook' => $this->webhook,
            'workflow' => $this->workflow,
            'source' => $this->source,
            'target' => $this->target,
        ];

        Http::withToken(config('file-flux.api_key'))
            ->retry(3)
            ->acceptJson()
            ->post(self::API_ENDPOINT, $data);
    }

    protected function validateTargetConfig(array $config)
    {
        $requiredKeys = ['extension', 'filename'];

        foreach ($requiredKeys as $key) {
            if (! isset($config[$key])) {
                throw new \InvalidArgumentException("Target configuration must include '{$key}'");
            }
        }
    }
}
