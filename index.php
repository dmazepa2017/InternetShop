<?php
/**
 *
 */


    //  FRONT CONTROLLER


    // 1. ОБЩИЕ НАСТРОЙКИ

        // Включение ошибок на сайте
            ini_set ('display_errors', 1);
            error_reporting(E_ALL);

    // 2. ПОДКЛЮЧЕНИЕ ФАЙЛОВ СИСТЕМЫ

        // Подключение Router
        define('ROOT', dirname(__FILE__));
        require_once (ROOT.'/components/Router.php');


    // 3. УСТАНОВКА СОЕДИНЕИНЯ С БД


    // 4. ВЫЗОВ Router

    $router = new Router();
    $router->run();



