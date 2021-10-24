<?php

declare(strict_types=1);

namespace InternalClient;

use InternalClient\ApiClients\UserVillageApi;
use InternalClient\ApiClients\WorldWonderApi;

interface InternalClientContract
{
    /**
     * @return UserVillageApi
     */
    public function userVillage();

    /**
     * @return WorldWonderApi
     */
    public function worldWonder();
}
