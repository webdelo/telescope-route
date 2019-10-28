<?php
/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 1/10/19
 * Time: 09:11
 */

namespace Webdelo\TelescopeRoute\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Webdelo\TelescopeRoute\Contracts\TelescopeRouteServiceContract;

/**
 * Class TelescopeRouteService
 *
 * @package App\Services\Auth
 */
class TelescopeRouteService implements TelescopeRouteServiceContract
{
    const TELESCOPE_PATH_FILE = 'telescope.path';

    /**
     * @return string
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function route(): string
    {
        $path        = 'telescope';

        return $this->isRouteExists()
            ? $path . '/' . $this->getPath()
            : $path;
    }

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

    /**
     * @return bool
     */
    public function isRouteExists(): bool
    {
        return Storage::disk('local')->exists(self::TELESCOPE_PATH_FILE);
    }
}
