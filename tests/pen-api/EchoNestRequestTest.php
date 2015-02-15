<?php

namespace nickescobedo\penapi;

use \Mockery as m;

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

    public function testSendReturnsData(){
        $this->echoNest->song();
        $this->echoNest->setMethodRoute('search');

        $songData = json_encode('{
            "response": {
                "status": {
                    "code": 0,
                    "message": "Success",
                    "version": "4.2"
                },
                "songs": [
                    {
                        "artist_id": "ARH6W4X1187B99274F",
                        "id": "SOCZZBT12A6310F251",
                        "artist_name": "Radiohead",
                        "title": "Karma Police"
                    }
                ]
            }
        }');

        $httpClient = m::mock('\GuzzleHttp\Client');
        $httpClient->shouldReceive('get')->once()->andReturn($songData);
        $apiKey = 'test_api_key';

        $echoNest = new EchoNestRequest($httpClient, $apiKey);
        $response = $echoNest->song()->send([
            'methodRoute' => 'search',
            'queryParameters' => [
                'title' => 'Happy'
            ],
        ]);

        $this->assertInstanceOf('\nickescobedo\penapi\EchoNestResponse', $response);



        $url = $this->echoNest->buildUrl(['title' => 'Wish You Were Here']);
        dd($url);
    }

} 