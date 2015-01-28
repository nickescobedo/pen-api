<?php


namespace nickescobedo\penapi\api;

use nickescobedo\penapi\EchoNestApi;

class SongApi extends EchoNestApi {
    protected $apiSlug = 'song';
    protected $responseKey = 'songs';

    public function search()
    {
        $this->methodSlug = 'search';

    }

    public function profile()
    {
        $this->methodSlug = 'profile';
    }

} 