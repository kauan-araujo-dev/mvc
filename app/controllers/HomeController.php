<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Services\UserService;

class HomeController extends Controller
{
    
    public function index(): void
    {
        $service = new UserService();
        $this->view("home/index.php", [$service->getUsers()]);
    }

}
