<?php


namespace App\Core;

use App\Controllers\Error\ErrorController;

class Router
{
    public array $routes = [];
    public function get(string $route, string $class, string $method): void
    {

        $this->routes[$route] = [
            'class' => $class,
            'method' => $method
        ];
    }
    public function dispatch(string $url): void
    {
        if (\str_ends_with($url, "/")) $url = \substr($url, 0, -1);

        $routerClass = null;
        $routerMethod = null;

        $url = "/" . $url;
        $urlFound = $this->urlCompare($url);
        echo "url: $urlFound </br>";
        if (!empty($urlFound)) {
            if (\array_key_exists($urlFound, $this->routes)) {

                $class = $this->routes[$urlFound]['class'];

                if (\class_exists($class)) {

                    $method = $this->routes[$urlFound]['method'];

                    if (\method_exists((new $class()), $method)) {
                        $routerClass = new $class();
                        $routerMethod = $method;
                    }
                }
            }
        }

        if (empty($routerClass)) {
            (new ErrorController())->index();
        } else {
            $params = $this->urlParams($url);
            \call_user_func([$routerClass, $routerMethod], $params);
        }
    }

    private function urlCompare(string $url): string
    {
        $urlArray = explode("/", $url);
        $isEqual = false;

        foreach ($this->routes as $route => $chave) {

            $routeUrl = explode("/", $route);

            if (\count($urlArray) == count($routeUrl)) {
                for ($i = 0; $i < \count($urlArray); $i++) {
                    if (\str_contains($routeUrl[$i], "{")) {
                        if (!empty($urlArray[$i])) {
                            $isEqual = true;
                        } else {
                            $isEqual = false;
                            break;
                        }
                    } else if ($routeUrl[$i] == $urlArray[$i]) {
                        $isEqual = true;
                    } else {
                        $isEqual = false;
                        break;
                    }
                }
            } else {
                continue;
            }
            if ($isEqual) {
                return $route;
            }
        }
        return "";
    }

    private function urlParams(string $url): ?array
    {
        $urlArray = explode("/", $url);
        $isEqual = false;

        foreach ($this->routes as $route => $chave) {

            $routeUrl = explode("/", $route);

            if (\count($urlArray) == count($routeUrl)) {
                $params = [];
                for ($i = 0; $i < \count($urlArray); $i++) {
                    if (\str_contains($routeUrl[$i], "{" ) && str_contains($routeUrl[$i], "}")) {
                        if (!empty($urlArray[$i])) {
                            $param = \substr($routeUrl[$i], 1, -1);
                            $params[$param] = $urlArray[$i];
                            $isEqual = true;
                        } else {
                            $isEqual = false;
                            break;
                        }
                    } else if ($routeUrl[$i] == $urlArray[$i]) {
                        $isEqual = true;
                    } else {
                        $isEqual = false;
                        break;
                    }
                }
            } else {
                continue;
            }
            if ($isEqual) {
                return $params;
            }
        }
        return null;
    }
}
