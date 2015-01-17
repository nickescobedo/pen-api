<?php

namespace nickescobedo\penapi;

interface RequestInterface {
    public function getData();

    public function sendData($data);

    public function getResponse();

    public function getParameters();
} 