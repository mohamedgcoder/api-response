<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait DataTrait
{
    protected array $data = [];

    public function data(array $data): self
    {
        $this->data = array_merge($this->data, $data);
        return $this;
    }
}
