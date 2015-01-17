<?php

namespace nickescobedo\penapi;

interface ResponseInterface {
    public function isSuccessful();

    public function getErrors();

    public function getRequest();

    public function getResponse();
} 