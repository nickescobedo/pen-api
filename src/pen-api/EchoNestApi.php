<?php


namespace nickescobedo\penapi;


use GuzzleHttp\Client;
use nickescobedo\penapi\request\EchoNestRequest;

class EchoNestApi {
    protected $apiSlug;
    protected $methodSlug;

    public function call(){
        $echoNestRequest = new EchoNestRequest(new EchoNestConfig(), new Client());
        $echoNestRequest->call();
    }
}