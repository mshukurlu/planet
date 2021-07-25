<?php
namespace App\Parts;

use App\Parts\Router\RouterServiceProvider;

class ServiceProvider
{
    public function execute()
    {
        (new RouterServiceProvider())->run();
    }
}