<?php

namespace nickescobedo\penapi;


class EchoNestApiTest extends TestCase{
    public function testBuildUrl()
    {
        $request = new EchoNestApi($this->echoNestConfig);
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));

        $this->assertEquals('dfsdfs', $url);
    }
} 