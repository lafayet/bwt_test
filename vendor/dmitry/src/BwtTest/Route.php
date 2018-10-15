<?php

namespace BwtTest;

class Route
{
    public static function start()
    {
        // контроллер и действие по умолчанию
        $controller_name = 'Login';
        $action_name = 'Index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        
        // получаем имя контроллера
        if (!empty($routes[2]) && $routes[2] != 'index.php') {    
            $controller_name = $routes[2];
        }
        
        // получаем имя экшена
        if (!empty($routes[3])) {
            $action_name = $routes[3];
        }

        // добавляем префиксы
        $model_name = 'BwtTest\Models\Model'.ucfirst($controller_name);
        $controller_name = 'BwtTest\Controllers\Controller'.ucfirst($controller_name);
        $action_name = 'action'.ucfirst($action_name);
        
        // создаем контроллер
        $controller = new $controller_name($model_name);

        if (method_exists($controller, $action_name)) {
            // вызываем действие контроллера
            $controller->$action_name();
        } else {
            // здесь также разумнее было бы кинуть исключение
            Route::errorPage404();
        }    
    }
    
    function errorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}