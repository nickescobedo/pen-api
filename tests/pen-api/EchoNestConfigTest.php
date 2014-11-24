<?php

namespace nickescobedo\penapi;


class EchoNestConfigTest extends \PHPUnit_Framework_TestCase{
    public function testReturnFormat(){
        $echoNestConfig = new EchoNestConfig();
        $echoNestConfig->setReturnFormat('json');

        $this->assertEquals('json', $echoNestConfig->getReturnFormat());
    }
} 