<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait ResponseAccessors
{
    public function setData($data): void
    {
        $this->data = $data;
        $this->setPagination();
    }

    private function setPagination(): void
    {
        $data = $this->data();

        try {
            $paginationData = [
                'path' => $data->path(),
                'total' => $data->total(),
                'perPage' => $data->perPage(),
                'currentPage' => $data->currentPage(),
                'lastPage' => $data->lastPage(),
            ];
        } catch (\Throwable $th) {
            // throw $th;
            $paginationData = [];
        }

        $this->pagination = $paginationData;
    }

    public function setException($exception): void
    {
        $this->exception = $exception;
    }

    public function setEc(int $ec): void
    {
        $this->ec = $ec;
    }

    public function setMessages(array $messages): void
    {
        $this->messages = $messages;
    }

    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    protected function data()
    {
        return $this->data;
    }

    protected function pagination()
    {
        return $this->pagination;
    }

    protected function exception()
    {
        return $this->exception;
    }

    protected function ec(): int
    {
        return $this->ec;
    }

    protected function messages()
    {
        return $this->messages;
    }
    protected function code(): int
    {
        return $this->code;
    }
}