<?php

namespace nickescobedo\penapi;

interface RateLimitInterface {
    public function getRateLimit();

    public function getRateLimitUsed();

    public function getRateLimitRemaining();
} 