<?php


namespace nickescobedo\penapi;


use GuzzleHttp\Client;
use nickescobedo\penapi\request\EchoNestRequest;

class EchoNestApi {
    private $baseUrl;
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
        return $this->baseUrl . '/' . $this->apiSlug . '?' . $urlParameters;
    }
}