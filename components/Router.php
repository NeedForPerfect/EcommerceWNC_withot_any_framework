<?php

/**
 * Класс Router
 * Компонент для работы с маршрутами
 */
class Router
{

    /**
     * Свойство для хранения массива роутов
     * @var array 
     */
    private $routes;

    /**
     * Конструктор
     */
    public function __construct()
    {
        // echo $this->getURI();
        // тіпа для деяких ур. загрузиш список роутів з бд. 
        // так шоб особо логіку роутеру не міняти 
        
        // Путь к файлу с роутами
        $routesPath = ROOT . '/config/routes.php';

        // Получаем роуты из файла
        $this->routes = include($routesPath);
    }

    /**
     * Возвращает строку запроса
     */
    private function getURI()
    {
        if (!empty($_SERVER['REDIRECT_URL'])) {
            return trim($_SERVER['REDIRECT_URL'], '/');
        }
    }

    /**
     * Метод для обработки запроса
     */
    public function run()
    {
        
        
        // Получаем строку запроса
        $uri = $this->getURI();

        //костыль. но ниче
        //проверим наличие роута по страницам товара в БД
        
      $product_routes =  Product::getRoutes();

      
      foreach ($product_routes AS $rout) {
          
         
          
          if ($rout['rout'] === $uri) {
             
              
             $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id FROM product WHERE friendly_url = :friendly';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':friendly', $uri, PDO::PARAM_STR);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();

        // Получение и возврат результатов
        $prod_id = $result->fetch();
        
        
       $uri = 'product/'.$prod_id['id'];       
        
             
              
          } 
              
             
              
          }
          
          
         

        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path) {

       
            
            if (preg_match("~$uriPattern~", $uri) ) {
                
        
            
           

                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                // Определить контроллер, action, параметры
                
             //   var_dump($internalRoute); die();

                $segments = explode('/', $internalRoute);

                
                
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                // Подключить файл класса-контроллера
                $controllerFile = ROOT . '/controllers/' .
                        $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Создать объект, вызвать метод (т.е. action)
                $controllerObject = new $controllerName;

                /* Вызываем необходимый метод ($actionName) у определенного 
                 * класса ($controllerObject) с заданными ($parameters) параметрами
                 */

            if (($uriPattern === '') && $uri != '') { echo 'page not found'; die(); } 
                
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                // Если метод контроллера успешно вызван, завершаем работу роутера
                if ($result != null) {
                    
                    break;
                }
            }
       
        }



        
    }

}
