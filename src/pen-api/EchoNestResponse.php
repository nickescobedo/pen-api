<?php

namespace nickescobedo\penapi;

class EchoNestResponse implements ResponseInterface{
    protected $request;
    protected $rawResponse;
    protected $body;

    public function __construct(RequestInterface $request, $data)
    {
        $this->request = $request;
        $this->rawResponse = $data;
        $this->decodeBody();
    }

    public function decodeBody()
    {
        $this->body = $this->rawResponse->getBody();
        return $this->body;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getData()
    {
        return $this->data;
    }

    public function isSuccessful()
    {
        // TODO: Implement isSuccessful() method.
    }

    public function getErrors()
    {
        // TODO: Implement getErrors() method.
    }

    public function getResponse()
    {
        // TODO: Implement getResponse() method.
    }
}