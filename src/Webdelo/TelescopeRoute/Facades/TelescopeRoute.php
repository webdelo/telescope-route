<?php

namespace Webdelo\TelescopeRoute\Facades;

use Webdelo\TelescopeRoute\Services\TelescopeRouteService;

/**
 * Class TelescopeRoute
 * @package Webdelo\TelescopeRoute\Facades
 */
class TelescopeRoute
{
    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function route()
    {
        return (new TelescopeRouteService())->route();
    }
}
