<?php

namespace nickescobedo\penapi;


class EchoNestConfigTest extends TestCase{
    public function testReturnFormat(){
        $echoNestConfig = new EchoNestConfig();
        $echoNestConfig->setReturnFormat('json');

        $this->assertEquals('json', $echoNestConfig->getReturnFormat());
    }
} 