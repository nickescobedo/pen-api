<?php

namespace nickescobedo\penapi;


use GuzzleHttp\Client;

class TestCase extends \PHPUnit_Framework_TestCase {
    protected $echoNest;

    protected function setUp(){
        $this->echoNest = new EchoNestRequest(new Client(), '');
    }
} 