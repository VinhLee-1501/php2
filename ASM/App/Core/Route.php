<?php

namespace App\Core;

class Route
{
    public $url;
    public $nameController = ['HomeClientController', 'HomeAdminController'];
    public $nameMethod = "home";
    public $path = 'App/Controllers/';
    public $adminPath = 'App/Controllers/admin/';
    public $clientPath = 'App/Controllers/client/';
    public $controller;

    function __construct()
    {
        $this->request();
        $this->renderController();
        $this->renderMethod();
    }

    function request()
    {
        $this->url = isset($_GET['url']) ? $_GET['url'] : null;
//        var_dump($this->url);

        // filter_var trong php là gì?
        if ($this->url != null) {
            $this->url = rtrim($this->url, '/');
            $this->url = explode('/', filter_var($this->url, FILTER_SANITIZE_URL));
        } else {
            unset($this->url);
        }
    }

    function renderController()
    {
//        var_dump($this->url);
        if (!isset($this->url[0])) {
            $className = $this->clientPath . $this->nameController[0];
            $className = preg_replace("~\/~", "\\", $className);
            $this->controller = new $className;
//            var_dump($this->controller);
            $this->controller->homePage();
        } else {
            $this->nameController = $this->url[0];
            if ($this->clientPath) {
                $file = __DIR__ . '/../Controllers/client/' . $this->nameController . '.php';
                if (file_exists($file)) {
                    require_once $file;
                    $this->path = $this->clientPath;
                    $className = $this->path . $this->nameController;
                    $className = preg_replace("~\/~", "\\", $className);
                    if (class_exists($className)) {
                        $this->controller = new $className;
                    } else {
                        header('Location:' . ROOT_URL . 'HomeController/Error');
                    }
                } else {
                    $file = __DIR__ . '/../Controllers/admin/' . $this->nameController . '.php';
                    if (file_exists($file)) {
                        require_once $file;
                        $this->path = $this->adminPath;
                        $className = $this->path . $this->nameController;
                        $className = preg_replace("~\/~", "\\", $className);
                        if (class_exists($className)) {
                            $this->controller = new $className;
                        } else {
                            header('Location:' . ROOT_URL . 'HomeController/Error');
                        }
                    }
                }
            }else{
                echo '<h4 class="text-center">Not Found</h4>';
            }

        }
    }


    function renderMethod()
    {
        if (isset($this->url[2])) {
            $this->nameMethod = $this->url[1];
            // Kiểm tra xem có tồn tại method vừa gán
            if ($this->controller && method_exists($this->controller, $this->nameMethod)) {
                $this->controller->{$this->nameMethod}($this->url[2]);
            } else {
                echo 'loi1';
                header('Location:' . ROOT_URL . 'HomeClientController/Error');
            }
        } else {
            // kiểm tra hàm có tồn tại hàm không có tham số
            if (isset($this->url[1])) {
                $this->nameMethod = $this->url[1];
                if ($this->controller && method_exists($this->controller, $this->nameMethod)) {
                    $this->controller->{$this->nameMethod}();
                } else {
                    echo 'loi2';
//                    echo get_class($this->controller) . "::" . $this->nameMethod;
                }
            }
        }
    }
}