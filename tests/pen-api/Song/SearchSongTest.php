<?php

namespace nickescobedo\penapi\song;

use nickescobedo\penapi\EchoNestConfig;
use nickescobedo\penapi\TestCase;

class SearchSongTest extends TestCase {
    public function testBuildSearchSongUrl(){
        $config = new EchoNestConfig();
        $config->setApiKey('test_api_key');
        $config->setReturnFormat('json');

        $request = new SearchSong($config);
        $url = $request->buildUrl(array('artist' => 'Taylor Swift'));
        $this->assertEquals('http://developer.echonest.com/api/v4/song/search?api_key=test_api_key&format=json&artist=Taylor+Swift', $url);
    }
} 