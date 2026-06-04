<?php

namespace App\Core;

use App\Core\Request;
use App\Core\Router;
use Dotenv\Dotenv;

class Bootstrap
{
    public function run()
    {
        $dotenv = Dotenv::createImmutable(__DIR__. "/../../");
        $dotenv->load();
        $router = new Router();

        $request = new Request();

        require __DIR__ . "/../routes/routes.php";

        $url = $request->get("url") ?? null;

        $router->dispatch($url);
    }
}
