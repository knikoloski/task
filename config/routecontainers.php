<?php

use App\Controllers\PixelController;
use App\Controllers\AuthController;

return function($container)
{
    $container['PixelController'] = function()
    {
        return new PixelController();
    };
    $container["AuthController"] = function()
    {
        return new AuthController();
    };
};