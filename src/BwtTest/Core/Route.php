<?php

namespace BwtTest\Core;

class Route
{
    public static function start()
    {
        // default controller and action
        $controller_name = 'Login';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        //getting controller name from requested url
        if (!empty($routes[2]) && $routes[2] != 'index.php') {
            $controller_name = $routes[2];
        }
        
        //getting action name from requested url
        if (!empty($routes[3])) {
            $action_name = $routes[3];
        }

        //adding prefixes
        $model_name = 'BwtTest\Models\Model'.ucfirst($controller_name);
        $controller_name = 'BwtTest\Controllers\Controller'.ucfirst($controller_name);
        $action_name = 'action'.ucfirst($action_name);
        
        // creating model
        $model = null;
        if (class_exists($model_name)) {
            $model = new $model_name;
        }
        if (class_exists($controller_name)) {
            $controller = new $controller_name($model);
        }
        if (method_exists($controller, $action_name)) {
            // вызываем действие контроллера
            $controller->$action_name();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::errorPage404();
        }
    }
    
    private static function errorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}
