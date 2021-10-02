<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $data = [];
    private $error = false;
    private $message = "Api response is successfully.";
    private $headers = [];
    private $statusCode = 200;

    protected function setData($data){
        $this->data = $data;
        return $this;
    }

    protected function setError($error){
        $this->error = $error;
        return $this;
    }

    protected function setMessage($message){
        $this->message = $message;
        return $this;
    }

    protected function setHeader($header){
        $this->header = $header;
        return $this;
    }

    protected function setStatusCode($code){
        $this->statusCode = $code;
        return $this;
    }

    protected function getResponse(){
        $_response = new \stdClass;
        $_response->error = $this->error;
        $_response->message = $this->message;
        $_response->data = $this->data;
        return response()->json($_response,$this->statusCode,$this->headers);
    }

    protected function sendSuccessReponse($message='',$data=[]){
        $_response = new \stdClass;
        $_response->error = false;
        $_response->message = $message;
        $_response->data = $data;
        return response()->json($_response, $this->statusCode);
    }

    protected function sendFailResponse($message='',$data=[]){
        $_response = new \stdClass;
        $_response->error = true;
        $_response->message = $message;
        $_response->data = $data;
        return response()->json($_response,$this->statusCode);
    }

    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->statusCode, $headers);
    }

}
