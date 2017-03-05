<?php

namespace Nomad145\SpotifyBundle\Factory;

/**
 * Class SpotifyApiFactory
 * @author Michael Phillips <michaeljoelphillips@gmail.com>
 */
class SpotifyApiFactory
{
    /** @var SpotifyWebAPI\Session */
    protected $session;

    /** @var array */
    protected $scopes;

    /**
     * __construct
     */
    public function __construct(\SpotifyWebAPI\Session $session, array $scopes = [])
    {
        $this->session = $session;
        $this->scopes = $scopes;
    }

    /**
     * createSpotifyApi
     *
     * @return \SpotifyWebAPI\SpotifyWebAPI
     */
    public function createSpotifyApi()
    {
        $this->session->requestCredentialsToken($this->scopes);

        $api = new \SpotifyWebAPI\SpotifyWebAPI();
        $api->setAccessToken($this->session->getAccessToken());

        return $api;
    }
}
