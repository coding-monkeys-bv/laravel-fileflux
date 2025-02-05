<?php

namespace Codingmonkeys\FileFlux;

class FileFlux
{
    protected $project;

    protected $webhook;

    protected $workflow;

    protected $source;

    protected $target;

    public function project($id = null)
    {
        $this->project = $id ?? config('fileflux.project');

        return $this;
    }

    public function webhook(string $url = null)
    {
        $this->webhook = $url ?? config('fileflux.webhook');

        return $this;
    }

    public function workflow()
    {
        $this->workflow = '';

        return $this;
    }

    public function source()
    {
        $this->source = '';

        return $this;
    }

    public function target(array $config = [])
    {
        $this->validateTargetConfig($config);

        $this->target = $config;

        return $this;
    }

    public function convert()
    {
        // Actual processing logic
        return [
            'project' => $this->project,
            'webhook' => $this->webhook,
            'workflow' => $this->workflow,
            'source' => $this->source,
            'target' => $this->target,
        ];
    }

    protected function validateTargetConfig(array $config)
    {
        $requiredKeys = ['extension', 'filename'];

        foreach ($requiredKeys as $key) {
            if (!isset($config[$key])) {
                throw new \InvalidArgumentException("Target configuration must include '{$key}'");
            }
        }
    }
}
