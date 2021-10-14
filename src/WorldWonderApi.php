<?php

declare(strict_types=1);

namespace InternalClient;

use Guzzle\Http\ClientInterface;
use Psr\Log\LoggerInterface;

class WorldWonderApi
{
    public function __construct(
        private ClientInterface $client,
        private LoggerInterface $logger,
    ) {
    }

    /**
     * @throws \Throwable
     */
    public function isFinished(): int
    {
        try {
            $url = '/is_finished';

            $response = $this->client->post($url);
        } catch (\Throwable $exception) {
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
