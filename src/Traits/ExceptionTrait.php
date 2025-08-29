<?php

namespace MohamedAhmed\ApiResponse\Traits;

use Throwable;

trait ExceptionTrait
{
    protected array $exception = [];

    public function exception(Throwable $e): self
    {
        $this->exception = [
            'message' => $e->getMessage(),
            'line' => $e->getLine(),
            'file' => $e->getFile(),
            'code' => $e->getCode(),
        ];
        return $this;
    }
}
