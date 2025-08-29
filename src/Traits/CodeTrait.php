<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait CodeTrait
{
    protected int $code = 200;

    public function code(int $code): self
    {
        $this->code = $code;
        return $this;
    }
}
