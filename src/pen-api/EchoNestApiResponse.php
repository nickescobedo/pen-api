<?php

namespace nickescobedo\penapi;


use GuzzleHttp\Exception\ParseException;
use GuzzleHttp\Exception\XmlParseException;

class EchoNestApiResponse {
    protected $data;
    protected $headers;
    protected $body;
    protected $response;

    public function __construct($response)
    {
        $this->response = $response;
        $this->parseBody();
    }

    public function parseBody()
    {
        if($this->isJson()){
            $this->parseJsonResponse();
        }
        else if($this->isXml()){
            $this->parseXmlResponse();
        }
    }

    public function parseJsonResponse()
    {
        $body = json_decode($this->response->getBody());
        $this->body = $body->response;
    }

    public function parseXmlResponse()
    {
        $this->body = $this->response->xml();
    }

    public function isSuccessful()
    {
        $status = $this->body->status;
        if($status->code == 0)
        {
            return true;
        }
        return false;
    }

    public function getErrors()
    {
        $status = $this->body->status;
        return $status->message;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function isXml()
    {
        try {
            $this->response->xml();
        } catch(XmlParseException $e){
            return false;
        }

        return true;
    }

    function isJson()
    {
        try {
            $this->response->json();
        } catch(ParseException $e){
            return false;
        }

        return true;
    }

} 