<?php

namespace Blackfyre\BitnetGateway;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Blackfyre\BitnetGateway\Skeleton\SkeletonClass
 */
class BitnetGatewayFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bitnet-gateway';
    }
}
