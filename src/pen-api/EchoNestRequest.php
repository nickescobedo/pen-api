<?php

namespace nickescobedo\penapi;

use GuzzleHttp\ClientInterface;

class EchoNestRequest implements RequestInterface {
    protected $baseUrl = 'https://developer.echonest.com/api/v4';
    protected $httpClient;
    protected $httpRequest;
    protected $response;
    protected $apiKey;
    protected $apiRoute;
    protected $methodRoute;
    protected $queryParameters;

    /*
     * Every request will have
     * Api key
     * URL
     * Response
     * Data
     * Api route
     * method route
     */

    public function __construct(ClientInterface $httpClient, $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->setApiKey($apiKey);
    }

    public function send(array $queryParameters)
    {
        $this->setApiRoute($queryParameters['apiRoute']);
        $this->setMethodRoute($queryParameters['methodRoute']);
        $this->response = $this->httpClient->get($this->buildUrl($this->buildQueryParameters($queryParameters)));
        return new EchoNestResponse($this, $this->response);
    }

    private function buildUrl(array $parameters)
    {
        $urlParameters = http_build_query($parameters);
        return $this->baseUrl . '/' . $this->getApiRoute() . '/' . $this->getMethodRoute() . '?' . $urlParameters;
    }

    private function buildQueryParameters($queryParameters)
    {

        $stuff = $queryParameters['queryParameters'];
        $apiKey = array('api_key' => $this->getApiKey());

        $stuff = $apiKey + $stuff;

        return $stuff;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getApiRoute()
    {
        return $this->apiRoute;
    }

    public function setApiRoute($apiRoute)
    {
        $this->apiRoute = $apiRoute;
    }

    public function getMethodRoute()
    {
        return $this->methodRoute;
    }

    public function setMethodRoute($methodRoute)
    {
        $this->methodRoute = $methodRoute;
    }

    public function getQueryParameters()
    {
        return $this->queryParameters;
    }

    public function setQueryParameters(array $parameters)
    {
        $this->queryParameters = $parameters;
    }
}