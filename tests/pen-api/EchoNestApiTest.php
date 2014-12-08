<?php

namespace nickescobedo\penapi;


use GuzzleHttp\Client;
use nickescobedo\penapi\song\SearchSong;

class EchoNestApiTest extends TestCase{
    public function testBuildUrl()
    {
        $config = new EchoNestConfig();
        $config->setApiKey('test_api_key');
        $config->setReturnFormat('json');

        $request = new SearchSong($config, new Client());
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));
        $this->assertEquals('http://developer.echonest.com/api/v4/song/search?api_key=test_api_key&format=json&artist=Taylor+Swift', $url);
    }
} 