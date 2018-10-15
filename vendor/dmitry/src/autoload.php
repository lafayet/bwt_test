<?php

$path = "BwtTest/";
require_once $path.'Core/Validate.php';
require_once $path.'Core/Model.php';
require_once $path.'Core/View.php';
require_once $path.'Core/Controller.php';
require_once $path.'Core/MController.php';
require_once $path.'Core/Route.php';
BwtTest\Core\Route::start(); // запускаем маршрутизатор
