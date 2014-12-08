<?php

namespace nickescobedo\penapi;

class EchoNestConfig {
    private $apiKey;
    private $returnFormat = 'json';
    private $baseUrl;

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param mixed $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return mixed
     */
    public function getReturnFormat()
    {
        return $this->returnFormat;
    }

    /**
     * @param mixed $returnFormat
     */
    public function setReturnFormat($returnFormat)
    {
        $this->returnFormat = $returnFormat;
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param mixed $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
} 
