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
use League\Flysystem\FileNotFoundException;
use Webdelo\TelescopeRoute\Contracts\TelescopeRouteServiceContract;

/**
 * Class TelescopePathService
 *
 * @package App\Services\Auth
 */
class TelescopeRouteService implements TelescopeRouteServiceContract
{
    const TELESCOPE_PATH_FILE = 'telescope.path';

    /**
     * @return string
     */
    public function route(): string
    {
        $path        = 'telescope';
        $keyFilePath = storage_path('app/'.self::TELESCOPE_PATH_FILE);

        return file_exists(storage_path('app/'.self::TELESCOPE_PATH_FILE))
            ? $path.'/'.file_get_contents($keyFilePath)
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
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function isRouteExists(): bool
    {
        try {
            return file_exists($this->getPath());
        } catch (FileNotFoundException $exception) {
            return false;
        }
    }
}
