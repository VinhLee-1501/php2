<?php

namespace App\Core;

class Route
{
    protected array $routes;

    public function register(string $requestMethod, string $route, callable|array $action): self // Cho phép gọi nhiều phương thức liên tiếp cùng 1 đối tượng
    {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function submit(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }


    public function resolve(string $requestUrl, string $requestMethod)
    {
        $route = explode('?', $requestUrl)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (is_array($action)) {
            [$class, $method] = $action;
            [$email, $cardUser] = $action;

            if (class_exists($class)) {
                $class = new $class();

                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], [$email, $cardUser]);
                }
            }
        }
    }
}