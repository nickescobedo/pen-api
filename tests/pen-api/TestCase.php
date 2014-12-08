<?php

namespace nickescobedo\penapi;


class TestCase extends \PHPUnit_Framework_TestCase {
    protected $echoNestConfig;

    protected function setUp(){
        $this->echoNestConfig = new EchoNestConfig();
        $this->echoNestConfig->setBaseUrl('http://developer.echonest.com/api/v4');
        $this->echoNestConfig->setReturnFormat('json');
    }
} 