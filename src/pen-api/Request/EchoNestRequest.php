<?php


namespace nickescobedo\penapi\request;


use GuzzleHttp\Client;
use nickescobedo\penapi\EchoNestConfig;

class EchoNestRequest
{
    private $echoNestConfig;
    private $client;
    private $baseUrl;

    public function __construct(EchoNestConfig $echoNestConfig, Client $client)
    {
        $this->echoNestConfig = $echoNestConfig;
        $this->client = $client;
    }

    public function buildUrl(array $parameters)
    {
        $urlParameters = http_build_query($parameters);
        return $this->baseUrl . '?' . $urlParameters;
    }

    public function call()
    {

    }
} 