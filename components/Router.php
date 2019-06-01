<?php

class Router
{
    public $routes;

    public function __construct()
    {
        $routesPath = ROOT.'\config\components.json';
        $file = fopen($routesPath,'r');
        $this->routes = json_decode(fread($file,filesize($routesPath)),1);
    }

    public function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run($uri)
    {
        
        foreach ($this->routes as $uriPattern => $path)
	    {

            if (preg_match("~$uriPattern~", $uri))
            {
                
                $interalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                $segments = explode('/', $interalRoute);	

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $action = 'action' . ucfirst(array_shift($segments));
                
                $parametrs = $segments;

                $controllerFile = ROOT . '/controller/' . $controllerName . '.php';
                if (file_exists($controllerFile))
                {
                    include "$controllerFile";
                    $controllerObj = new $controllerName();
                    return call_user_func_array(array($controllerObj,$action),$parametrs);
                }
            }
        }
        return "404";
    }
}