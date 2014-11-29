<?php

namespace nickescobedo\penapi;


use nickescobedo\penapi\song\SearchSong;

class EchoNestApiTest extends TestCase{
    public function testBuildUrl()
    {
        $request = new SearchSong();
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));

        $this->assertEquals('http://developer.echonest.com/api/v4/song/search?artist=Taylor+Swift', $url);
    }
} 