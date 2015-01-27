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
        $this->parseResponse();
    }

    public function parseResponse()
    {
        if($this->isJson()){
            $this->parseJsonResponse();
        }
        else if($this->isXml()){
            $this->parseXmlResponse();
        }
        else{
            throw new \Exception;
        }

        $this->parseResponseBodyForData();
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

    public function isJson()
    {
        try {
            $this->response->json();
        } catch(ParseException $e){
            return false;
        }

        return true;
    }

    public function parseResponseBodyForData()
    {
        foreach($this->getBody() as $key => $value){
            if($key != 'status'){
                $this->data = $value;
                return true;
            }
        }

        return false;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getHeaders()
    {
        return $this->response->getHeaders();
    }

    public function getRateLimit()
    {
        return $this->response->getHeaders()['X-Ratelimit-Limit'];
    }

    public function getRateLimitUsed()
    {
        return $this->response->getHeaders()['X-Ratelimit-Used'];
    }
} 