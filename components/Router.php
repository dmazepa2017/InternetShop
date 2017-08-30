<?php
/**
 * Created by PhpStorm.
 * User: Mazok
 * Date: 14.08.2017
 * Time: 21:10
 */

class Router
{
    // Тут хранятся маршруты
    private $routes;

    // методы

        //Добавляем маршруты с файла routes.php
    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include ($routesPath);

    }

    // Метод возвращает строку запроса
    private function getURI ()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'] . '/');
        }
    }
        // Анализируем запрос и передаем управление
    public function run ()
    {
        // Получаем строку запроса
        $uri = $this->getURI();
       // echo "URI:$uri" . '<br>';

        // Проверяем наличие такого запроса в файле routes.php
        foreach ($this->routes as $uriPattern => $path) {

            // Сравниваем $uriPattern & $uri
            if (preg_match("~$uriPattern~", $uri)) {

                echo '<br> Где ищем (запрос, который набрал пользователь): ' . $uri;
                echo '<br> Что ищем (совпадение из правила): ' . $uriPattern;
                echo '<br> Кто обрабатывает:'  . $path;

                //олучаем внутренний путь из внешнего согласно правилу
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // определяем какой контроллер и акшен обрабатывают запрос
                $segments = explode('/', $path);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = "action" . ucfirst(array_shift($segments));


                // Подлючаем файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);


                }

                //Создаем объект, вызываем метод (т.е. action)

                $controllerObject = new $controllerName;
                $result = $controllerObject -> $actionName ();
                if ($result != null) {
                    break;
                }
            }
        }




    }
}

