<?php

require_once 'views/View.php';

class Router
 {
     private $ctrl;
     private $view;

     public function routeReq(){
          try{
              spl_autoload_register(function($class){
                  require_once('models/'.$class.'.php');
              });


              $url = '';
              if (isset($_GET['url'])) {

                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                $controller = ucfirst(strtolower($url[0]));

                $controllerClass = "Controller".$controller;

                $controllerFile = "controllers/".$controllerClass.".php";

                if (file_exists($controllerFile)){

                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);
                }
                else{
                    throw new Exception("Page non trouvée", 1);
                    
                }
              }

              else {
                   require_once('controllers/ControllerAccueil.php');
                   $this->ctrl =new ControllerAccueil($url);
              }
          } catch (\Exception $e){
              $errorMsg = $e -> getMessage();
              
              $this->_view = new View('Error');
              $this->_view->generate(array('errorMsg' => $errorMsg));

          }
     }

 }




?>