<?php

namespace nickescobedo\penapi;

class EchoNestResponse implements ResponseInterface{
    protected $request;
    protected $response;
    protected $body;

    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->response = $data;
        $this->decodeBody();
    }

    public function decodeBody()
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
        return $this->body;
    }

    private function isXml()
    {
        try {
            $this->response->xml();
        } catch(XmlParseException $e){
            return false;
        }

        return true;
    }

    private function isJson()
    {
        try {
            $this->response->json();
        } catch(ParseException $e){
            return false;
        }

        return true;
    }

    private function parseResponseBodyForData()
    {
        foreach($this->getBody() as $key => $value){
            if($key != 'status'){
                $this->data = $value;
                return true;
            }
        }

        return false;
    }

    private function parseJsonResponse()
    {
        $body = json_decode($this->response->getBody());
        $this->body = $body->response;
    }

    private function parseXmlResponse()
    {
        $this->body = $this->response->xml();
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getData()
    {
        return $this->body;
    }

    public function getBody()
    {
        return $this->body;
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

    public function getResponse()
    {
        return $this->response;
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