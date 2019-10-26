<?php
/**
 * Created by PhpStorm.
 * User: dmitricercel
 * Date: 1/10/19
 * Time: 09:12
 */

namespace RainXC\TelescopeProduction\Contracts;

/**
 * Interface TelescopeKeyServiceContract
 *
 * @package App\Contracts\Services\Auth
 */
interface TelescopePathServiceContract
{
    /**
     * @return string
     */
    public function generate(): string;

    /**
     * @return string
     */
    public function getPath(): string;
}
