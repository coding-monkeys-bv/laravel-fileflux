<?php

namespace Codingmonkeys\FileFlux\Exceptions;

class ValidationException extends \Exception
{
    protected $errors;

    public function __construct(array $errors)
    {
        $this->errors = $errors;
        parent::__construct('Validation failed for properties: '.implode(', ', array_keys($errors)));
    }

    public function getErrors()
    {
        return $this->errors;
    }
}
