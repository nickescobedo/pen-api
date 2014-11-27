<?php


namespace nickescobedo\penapi;


use GuzzleHttp\Client;
use nickescobedo\penapi\request\EchoNestRequest;

class Api {
    protected $slug;

    public function call(){
        $echoNestRequest = new EchoNestRequest(new EchoNestConfig(), new Client());
        $echoNestRequest->call();
    }
} 