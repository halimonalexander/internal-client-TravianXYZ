<?php

namespace InternalClient\ApiClients;

use Guzzle\Http\ClientInterface;
use Psr\Log\LoggerInterface;

class WorldWonderApi extends AbstractApiClient
{
    /**
     * @return int
     *
     * @throws \Throwable
     */
    public function isFinished()
    {
        return (int) $this->post('/is_finished')->getBody();
    }
}
