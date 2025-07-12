<?php

namespace MohamedAhmed\ApiResponse\Traits;

trait ResponseApi
{
    // use ResponseAccessors to set and get data
    use ResponseAccessors;

    private $data;
    private $pagination;
    private int $ec = 0;
    private int $code = 200;
    private string $status;
    private $exception;
    private $messages;

    public function apiResponse()
    {
        try {
            $dataSize = sizeof($this->data);
        } catch (\Throwable) {
            $dataSize = 1 ;
        }

        $dataSize = ($this->data() != null) ? $dataSize : 0 ;
        $status = (($dataSize >= 0 && $this->code == 200) || $this->code == 201) ? true : false;
        $this->messages = ($this->exception != null) ? [__('errors.some_thing_error')] : $this->messages ;
        $this->messages = ($dataSize === 0) ? (($this->messages == null) ? [__('errors.no_data_to_view')] : $this->messages) : $this->messages;

        return response()->json([
            'code' => $this->code,
            'responseStatus' => $status,
            'messages' => $this->messages, // show this message to user
            'response' => [
                'dataLength' => $dataSize,
                'pagination' => $this->pagination,
                'data' => $this->data(),
            ],
            // array
            'error' => [
                // string
                'errorCode' => ($this->ec === 0)? null : $this->ec, // code for detect or refer to development team
                // integer
                'line' => ($this->exception === null) ? null : $this->exception->getLine(), // line of error
                // string
                'errorMessage' => ($this->exception === null) ? null : $this->exception->getMessage(), // error message to specific error
                // string
                'file' => ($this->exception === null) ? null : $this->exception->getFile(), // file has the error
            ],
        ], $this->code);
    }
}