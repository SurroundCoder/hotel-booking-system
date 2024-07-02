<?php

namespace App\Http\Controllers;

abstract class Controller{
    public $httpCode = 400;
    public $rtnCode  = 9;
    public $rtnMsg, $rtnData;

    public function createJsonResponse(){
        $status = $this->httpCode;
        $data   = [
            'code'  => $this->rtnCode,
            'msg'   => $this->rtnMsg,
            'data'  => $this->rtnData,
        ];

        return response()->json($data, $status);
    }
}
