<?php

namespace InternalClient;

use Guzzle\Http\Client as GuzzleClient;
use Monolog\Logger;

class Client
{
    /**
     * @var WorldWonderApi
     */
    private $worldWonderApi;

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
