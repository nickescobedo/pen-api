<?php


namespace nickescobedo\penapi\api;

use nickescobedo\penapi\EchoNestConfig;


class SongTest {

    public function testBuildSearchSongUrl()
    {
        $config = new EchoNestConfig();
        $config->setApiKey('test_api_key');
        $config->setReturnFormat('json');

        $request = new SongApi($config);
        $request->search();
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));
        $this->assertEquals('http://developer.echonest.com/api/v4/song/search?api_key=test_api_key&format=json&artist=Taylor+Swift', $url);
    }
} 