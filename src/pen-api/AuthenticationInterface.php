<?php

namespace nickescobedo\penapi;

interface AuthenticationInterface {

    public function authenticate();

    public function unauthenticate();

} 