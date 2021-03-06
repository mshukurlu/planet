<?php
namespace App\Parts\Router;
use App\Parts\ServiceProvider;
use App\Parts\Router\Route;

/**
 * Class RouterServiceProvider
 * @package App\Parts\Router
 */
class RouterServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function mapWebRoutes()
    {
        include (BASE_DIR.'routes/web.php');
    }

    /**
     *
     */
    public function routes()
    {
        $this->mapWebRoutes();
    }

    /**
     *
     */
    public function run()
    {
        $this->routes();
        Route::execude();
    }
}
