<?php

namespace BwtTest\Core;

class Route
{
    public static function start()
    {
		$path = "vendor/dmitry/src/";
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
        $model_name = 'Model'.ucfirst($controller_name);
        $controller_name = 'Controller'.ucfirst($controller_name);
        $action_name = 'action'.ucfirst($action_name);

        // подцепляем файл с классом модели (файла модели может и не быть)

        $model_exists = false;
        $model_file = $model_name.'.php';
        $model_path = $path."BwtTest/Models/".$model_file;
		echo $model_path;
        if (file_exists($model_path)) {
            include $path."BwtTest/Models/".$model_file;
            $model_exists = true;
			echo "model exists";
        }

        // подцепляем файл с классом контроллера
        $controller_file = $controller_name.'.php';
        $controller_path = "BwtTest/Controllers/".$controller_file;
        if (file_exists($controller_path)) {
            include "BwtTest/Controllers/".$controller_file;
        } else {
            /*
            правильно было бы кинуть здесь исключение,
            но для упрощения сразу сделаем редирект на страницу 404
            */
            //Route::errorPage404();
        }
        
        
        // создаем контроллер
        if ($model_exists) {
            $controller = new $controller_name($model_name);
        } else {
            $controller = new $controller_name;
        }
        $action = $action_name;
        
        if (method_exists($controller, $action)) {
            // вызываем действие контроллера
            $controller->$action();
        } else {
            // здесь также разумнее было бы кинуть исключение
            //Route::errorPage404();
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