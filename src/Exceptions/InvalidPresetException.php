<?php

namespace Codingmonkeys\FileFlux\Exceptions;

use Exception;
use Throwable;

class InvalidPresetException extends Exception
{
    public function __construct(?string $preset, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Invalid preset: {$preset}", $code, $previous);
    }
}
