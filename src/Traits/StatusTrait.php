<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait StatusTrait
{
    protected bool $status = true;

    public function status(bool $status): self
    {
        $this->status = $status;
        return $this;
    }
}
