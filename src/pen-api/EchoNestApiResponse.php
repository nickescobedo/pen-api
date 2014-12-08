<?php

namespace nickescobedo\penapi;


class EchoNestApiResponse {
    protected $data;

    public function __construct($data)
    {
        $this->parseResponse($data);
    }

    public function parseResponse($data)
    {
        if($this->isJson($data)){
            $this->parseJsonResponse($data);
        }
        else if($this->isXml($data)){
            //Todo
        }
    }

    public function parseJsonResponse($data)
    {
        $this->data = json_decode($data);
    }

    public function isSuccessful()
    {

    }

    public function getErrors()
    {

    }

    public function getData()
    {
        return $this->data;
    }

    public function isXml($data)
    {
        //Todo
        return 'Todo';
    }

    function isJson($data)
    {
        json_decode($data);
        return (json_last_error() == JSON_ERROR_NONE);
    }

} 