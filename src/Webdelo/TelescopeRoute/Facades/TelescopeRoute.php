<?php

namespace Webdelo\TelescopeRoute\Facades;

use Illuminate\Support\Facades\Facade;
use Webdelo\TelescopeRoute\Contracts\TelescopeRouteServiceContract;

class TelescopeRoute extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return TelescopeRouteServiceContract::class;
    }
}
