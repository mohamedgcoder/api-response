<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait ErrorsTrait
{
    protected array $errors = [];

    public function errors(array $errors = []): self
    {
        $this->errors = array_merge($this->errors, $errors);
        $this->currentProperty = 'errors';
        return $this;
    }
}
