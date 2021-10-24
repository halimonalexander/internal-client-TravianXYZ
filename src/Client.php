<?php

namespace InternalClient;

use Guzzle\Http\Client as GuzzleClient;
use InternalClient\ApiClients\UserVillageApi;
use InternalClient\ApiClients\WorldWonderApi;
use Monolog\Logger;

class Client implements InternalClientContract
{
    /**
     * @var UserVillageApi
     */
    private $userVillageApi;

    /**
     * @var WorldWonderApi
     */
    private $worldWonderApi;

    public function userVillage()
    {
        if (!isset($this->userVillageApi)) {
            $this->userVillageApi = new UserVillageApi(
                new GuzzleClient($_ENV['REST_API_URL'] . '/'),
                new Logger('general')
            );
        }

        return $this->userVillageApi;
    }

    public function worldWonder()
    {
        if (!isset($this->worldWonderApi)) {
            $this->worldWonderApi = new WorldWonderApi(
                new GuzzleClient($_ENV['REST_API_URL'] . '/ww'),
                new Logger('general')
            );
        }

        return $this->worldWonderApi;
    }
}
