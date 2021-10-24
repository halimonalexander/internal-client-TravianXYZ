<?php

declare(strict_types=1);

namespace InternalClient\ApiClients;

use Exception;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\Response;
use Psr\Log\LoggerInterface;

abstract class AbstractApiClient
{
    /**
     * @var ClientInterface $client
     */
    protected $client;

    /**
     * @var LoggerInterface $logger
     */
    protected $logger;

    public function __construct($client, $logger)
    {
        $this->client = $client;
        $this->logger = $logger;
    }

    /**
     * @return Response
     *
     * @throws Exception
     */
    public function get(string $url)
    {
        try {
            return $this->client->get($url)->getResponse();
        } catch (Exception $exception) {
            $this->logger->error('Error while using internal client', [
                'url' => $url,
                'method' => 'get',
                'response' => $exception->getMessage(),
            ]);

            throw $exception;
        }
    }

    /**
     * @return string
     *
     * @throws Exception
     */
    public function getJson(string $url)
    {
        return (string) $this->get($url)->getBody();
    }

    /**
     * @return Response
     *
     * @throws Exception
     */
    public function post(string $url, array $data = [])
    {
        try {
            return $this->client->post($url, null, $data)->getResponse();
        } catch (Exception $exception) {
            $this->logger->error('Error while using internal client', [
                'url' => $url,
                'method' => 'post',
                'response' => $exception->getMessage(),
            ]);

            throw $exception;
        }
    }
}
