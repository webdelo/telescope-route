<?php
/**
 * Created by PhpStorm.
 * User: d.cercel
 * Date: 11/23/18
 * Time: 09:20
 */

if (! function_exists('get_telescope_path')) {
    /**
     * Retrieve current path for telescope utility
     *
     * @return string
     */
    function get_telescope_path()
    {
        $path        = 'telescope';
        $keyFilePath = storage_path('app/'.\RainXC\TelescopeProduction\Services\TelescopePathService::TELESCOPE_PATH_FILE);

        return file_exists(storage_path('app/'.\RainXC\TelescopeProduction\Services\TelescopePathService::TELESCOPE_PATH_FILE))
            ? $path.'/'.file_get_contents($keyFilePath)
            : $path;
    }
}
