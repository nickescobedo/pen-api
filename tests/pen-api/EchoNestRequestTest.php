<?php

namespace nickescobedo\penapi;


use GuzzleHttp\Client;

class EchoNestRequestTest extends TestCase {
    /**
     * @expectedException \Exception
     */
    public function testConstructorRequiresClientInterface(){
        $echoNest = new EchoNestRequest('', '');
    }

    /**
     * @expectedException \Exception
     */
    public function testConstructorRequiresApiKey(){
        $echoNest = new EchoNestRequest(new Client());
    }

    public function testSetArtistApiRoute(){
        $this->echoNest->artist();
        $this->assertEquals('artist', $this->echoNest->getApiRoute());
    }

    public function testSetGenreApiRoute(){
        $this->echoNest->genre();
        $this->assertEquals('genre', $this->echoNest->getApiRoute());
    }

    public function testSetSongApiRoute(){
        $this->echoNest->song();
        $this->assertEquals('song', $this->echoNest->getApiRoute());
    }

    public function testSetTrackApiRoute(){
        $this->echoNest->track();
        $this->assertEquals('track', $this->echoNest->getApiRoute());
    }

} 