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

    public function setException($exception)
    {
        $this->exception = $exception;
    }

    public function setEc($ec)
    {
        $this->ec = $ec;
    }

    public function setMessages($messages)
    {
        $this->messages = $messages;
    }

    public function setCode($code)
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

    protected function ec()
    {
        return $this->ec;
    }

    protected function messages()
    {
        return $this->messages;
    }
    protected function code()
    {
        return $this->code;
    }
}