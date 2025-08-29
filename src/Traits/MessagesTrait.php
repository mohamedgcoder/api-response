<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait MessagesTrait

{
    protected array $messages = [];

    public function messages(array|string $messages = []): self
    {
        $this->messages = array_merge($this->messages, (array)$messages);
        $this->currentProperty = 'messages';
        return $this;
    }
}
