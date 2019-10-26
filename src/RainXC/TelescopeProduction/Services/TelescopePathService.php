<?php
/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 1/10/19
 * Time: 09:11
 */

namespace RainXC\TelescopeProduction\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use src\Contracts\TelescopePathServiceContract;

/**
 * Class TelescopePathService
 *
 * @package App\Services\Auth
 */
class TelescopePathService implements TelescopePathServiceContract
{
    const TELESCOPE_PATH_FILE = 'telescope.path';

    /**
     * @return string
     */
    public function generate(): string
    {
        $path = Str::random(45);
        Storage::disk('local')->delete(self::TELESCOPE_PATH_FILE);
        Storage::disk('local')->put(self::TELESCOPE_PATH_FILE, $path);

        return $path;
    }

    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function getPath(): string
    {
        return Storage::disk('local')->get(self::TELESCOPE_PATH_FILE);
    }
}
