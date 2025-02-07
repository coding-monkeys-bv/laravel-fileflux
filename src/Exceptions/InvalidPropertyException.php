<?php

namespace Codingmonkeys\FileFlux\Exceptions;

use Exception;
use Throwable;

class InvalidPropertyException extends Exception
{
    public function __construct(?string $property, int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Invalid or missing property: {$property}", $code, $previous);
    }
}
