<?php

declare(strict_types=1);

namespace InternalClient\ApiClients;

class UserVillageApi extends AbstractApiClient
{
    public function getHourlyCpIncrementByUser(int $userId)
    {
        return $this->getJson("/user/{$userId}/villages/cp");
    }

    public function getPopulationByUser(int $userId)
    {
        return $this->getJson("/user/{$userId}/villages/population");
    }
}
