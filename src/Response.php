<?php

namespace MohamedAhmed\ApiResponse;

use MohamedAhmed\ApiResponse\Traits\CodeTrait;
use MohamedAhmed\ApiResponse\Traits\DataTrait;
use MohamedAhmed\ApiResponse\Traits\AlertsTrait;
use MohamedAhmed\ApiResponse\Traits\ErrorsTrait;
use MohamedAhmed\ApiResponse\Traits\StatusTrait;
use MohamedAhmed\ApiResponse\Traits\MessagesTrait;
use MohamedAhmed\ApiResponse\Traits\ExceptionTrait;
use MohamedAhmed\ApiResponse\Traits\PaginationTrait;

class Response
{
    use DataTrait,
        PaginationTrait,
        ErrorsTrait,
        MessagesTrait,
        AlertsTrait,
        ExceptionTrait,
        StatusTrait,
        CodeTrait;

    protected ?string $currentProperty = null;

    public static function make(): self
    {
        return new self();
    }

    public function add(string $item): self
    {
        if (!$this->currentProperty) {
            throw new \LogicException("No property selected to add to. Call errors(), messages(), or alerts() first.");
        }

        $this->{$this->currentProperty}[] = $item;
        return $this;
    }

    public function merge(array $items): self
    {
        if (!$this->currentProperty || !property_exists($this, $this->currentProperty)) {
            throw new \LogicException("No property selected to merge into. Call errors(), messages(), or alerts() first.");
        }

        if (!is_array($this->{$this->currentProperty})) {
            throw new \LogicException("Cannot merge into a non-array property.");
        }

        $this->{$this->currentProperty} = array_merge($this->{$this->currentProperty}, $items);
        return $this;
    }

    public function toJson()
    {
        return response()->json([
            'code' => $this->code,
            'status' => $this->status,
            'messages' => $this->messages,
            'response' => [
                'data' => $this->data,
                'pagination' => $this->pagination,
            ],
            'errors' => $this->errors,
            'exception' => $this->exception,
            'alerts' => $this->alerts,
        ], $this->code);
    }

}
