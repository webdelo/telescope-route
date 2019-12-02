# telescope-production

Plugin helps to hide telescope from public on API backend.

If you have to review some processes on your production API backend, you can just enable Telescope. <br>
If you have to review some processes on your production API backend in safety from foreign eyes, you should use this plugin. <br>
Standard gate that authorize user for Telescope dashboard uses session authorization mechanism that does not work on API with token authorization provided. 

**Installation**

`composer require webdelo/laravel-telescope-route`


**config/telescope.php**
```php
<?php

use \Webdelo\TelescopeRoute\Facades\TelescopeRoute;

return [
    //...
    
    /*
    |--------------------------------------------------------------------------
    | Telescope Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Telescope will be accessible from. Feel free
    | to change this path to anything you like. Note that the URI will not
    | affect the paths of its internal API that aren't exposed to users.
    |
    */

    'path' => env('TELESCOPE_PATH', TelescopeRoute::route()),
    
    //...
];

```


**Usage** <br>
Generate or get unique route for telescope <br>
`php artisan telescope:route`

Refresh unique route for telescope <br>
`php artisan telescope:route-refresh`
