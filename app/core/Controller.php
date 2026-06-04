<?php

namespace App\Core;

abstract class Controller
{
    public function view(string $view, array|object $data)
    {
        if (is_array($data)) {
            extract($data);
        }
        
        $viewFile =  __DIR__ . "\..\\views\\" . $view;

        if (!file_exists($viewFile)) {
            throw new \Exception("Página não existe");
        }

        require_once $viewFile;
    }
}
