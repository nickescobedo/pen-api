<?php


namespace nickescobedo\penapi;


use GuzzleHttp\Client;

class EchoNestApi {
    private $baseUrl = 'http://developer.echonest.com/api/v4';
    protected $apiSlug;
    protected $methodSlug;
    private $client;

    public function call(Client $client, $parameters){
        $this->client = $client;

        $this->client->get($this->buildUrl($parameters));
    }

    public function buildUrl(array $parameters)
    {
        $urlParameters = http_build_query($parameters);
        return $this->baseUrl . '/' . $this->apiSlug . '/' . $this->methodSlug . '?' . $urlParameters;
    }
}