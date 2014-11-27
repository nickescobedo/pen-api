<?php


namespace nickescobedo\penapi\request;


use GuzzleHttp\Client;
use nickescobedo\penapi\TestCase;

class RequestTest extends TestCase{
    public function testBuildUrl(){
        $request = new EchoNestRequest($this->echoNestConfig, new Client());
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));

        $this->assertEquals('dfsdfs', $url);
    }
} 