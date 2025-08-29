<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait AlertsTrait
{
    protected array $alerts = [];

    public function alerts(array|string $alerts = []): self
    {
        $this->alerts = array_merge($this->alerts, (array)$alerts);
        $this->currentProperty = 'alerts';
        return $this;
    }
}
