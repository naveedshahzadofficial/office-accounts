<?php

namespace App\Services;

class ApiResponseService
{
    private $data = [];
    private $error = false;
    private $message = "Api response is successfully.";
    private $headers = [];
    private $statusCode = 200;

    public function setData($data){
        $this->data = $data;
        return $this;
    }

    public function setError($error){
        $this->error = $error;
        return $this;
    }

    public function setMessage($message){
        $this->message = $message;
        return $this;
    }

    public function setHeader($header){
        $this->header = $header;
        return $this;
    }

    public function setStatusCode($code){
        $this->statusCode = $code;
        return $this;
    }

    public function response(){
        $response = \stdClass::class;
        $response->error = $this->error;
        $response->message = $this->message;
        $response->data = $this->data;
        return response()->json($response,$this->statusCode,$this->headers);
    }

}
