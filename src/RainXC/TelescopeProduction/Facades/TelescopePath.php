<?php

namespace RainXC\TelescopeProduction\Facades;

use Illuminate\Support\Facades\Facade;
use RainXC\TelescopeProduction\Contracts\TelescopePathServiceContract;

class TelescopePath extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TelescopePathServiceContract::class;
    }
}
