<?php

class Router
{
    private $_ctrl;
    private $_view;

    public function routeReq()
    {
        try
        {//CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function($class)
            {
                require_once('model/'.$class.'.php');
            });

            $url='';
            // LE CONTROLER EST INCLUS SELIN L'ACTION DE l'UTILISATEUR
            if(isset($_GET['url']))
            {
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0])); 
                $controllerClass = "Controller".$controller;
                $controllerFile = "controller/".controllerClass.'.php';

                if(file_exists($controllerFile))
                {
                    require_one($controllerFile);
                    $this->_ctrl = new $controllerClass($url);
                }
                else
                {
                    throw new Exception('Page introuvable');
                }
            }
            else{
                require_once('controller/ControllerIndex.php');
                $this->_ctrl = new Controller($url);
            }
        }
        catch(Exception $e)
        {
            $errorMsg= $e->getMessage();
            require_once('view/frontend/error.php');
        }
    }
}