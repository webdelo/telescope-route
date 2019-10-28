<?php
/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 1/10/19
 * Time: 09:12
 */

namespace Webdelo\TelescopeRoute\Contracts;

/**
 * Interface TelescopeKeyServiceContract
 *
 * @package App\Contracts\Services\Auth
 */
interface TelescopeRouteServiceContract
{
    /**
     * @return string
     */
    public function route(): string;

    /**
     * @return string
     */
    public function generate(): string;

    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return bool
     */
    public function isRouteExists(): bool;
}
