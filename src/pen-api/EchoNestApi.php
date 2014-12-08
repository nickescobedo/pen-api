<?php

namespace nickescobedo\penapi;


use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;

class EchoNestApi {
    private $baseUrl = 'http://developer.echonest.com/api/v4';
    protected $apiSlug;
    protected $methodSlug;
    private $client;
    private $echoNestConfig;

    public function __construct(EchoNestConfig $echoNestConfig){
        $this->echoNestConfig = $echoNestConfig;
    }

    public function call($parameters){
        $client = new Client();
        $response =  $client->get($this->buildUrl($parameters));
        return new EchoNestApiResponse($response->getBody());
    }

    public function buildUrl(array $parameters)
    {
        $returnFormat = array('format' => $this->echoNestConfig->getReturnFormat());
        $apiKey = array('api_key' => $this->echoNestConfig->getApiKey());
        $parameters =
        $parameters =  $apiKey + $returnFormat + $parameters;
        $urlParameters = http_build_query($parameters);
        return $this->baseUrl . '/' . $this->apiSlug . '/' . $this->methodSlug . '?' . $urlParameters;
    }
}