<?php

namespace InternalClient;

use Guzzle\Http\ClientInterface;
use Psr\Log\LoggerInterface;

class WorldWonderApi
{
    /**
     * @var ClientInterface $client
     */
    private $client;

    /**
     * @var LoggerInterface $logger
     */
    private $logger;

    public function __construct($client, $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @return int
     *
     * @throws \Throwable
     */
    public function isFinished()
    {
        try {
            $url = '/is_finished';

            $response = $this->client->post($url);
        } catch (\Exception $exception) {
            $this->logger->error('Error while using internal client', [
                'url' => $url,
                'method' => 'post',
                'response' => $exception->getMessage(),
            ]);

            throw $exception;
        }

        return (int) $response->getBody();
    }
}
