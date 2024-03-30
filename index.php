<?php
require_once __DIR__.'/req/init.php';

$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

define('_DEFVAR', 1);
// die();

if(empty($_SESSION['user'])){
    redirect('login');
}

if ($url == '/'){
    //https://broker.wuaze.com/
    //https://cooltext.com/Edit-Logo?LogoId=4549110457
    // This is the home page
    // Initiate the home controller
    // and render the home view
    redirect('login');
}else{
   
    //The first element should be a controller
    $requestedController = ucfirst($url[0]);
    
    // If a second part is added in the URI,
    // it should be a method
    $requestedAction = isset($url[1])? $url[1] :'index';
    
    // The remain parts are considered as
    // arguments of the method
    $requestedParams = array_slice($url, 2);
    
    // Check if controller exists. NB:
    // You have to do that for the model and the view too
    $ctrlPath = __DIR__.'/Controllers/'.$requestedController.'.php';
    
    if (file_exists($ctrlPath)) {
        
        $modelName      = ucfirst($requestedController).'Model';
        $controllerName = $requestedController;
        $viewName       = ucfirst($requestedController).'View';
        $className = "App\\Controllers\\{$controllerName}";
        $controllerObj  = New $className();
        
        // If there is a method - Second parameter
        if ($requestedAction != ''){
            // then we call the method via the view
            // dynamic call of the view
            if(method_exists($controllerObj, $requestedAction)){
                $controllerObj->$requestedAction($requestedParams);
            }else{
                header('HTTP/1.1 404 Not Found');
                die('404 - The file - '.$ctrlPath.' - not found');
            }
        }
    }else{
        header('HTTP/1.1 404 Not Found');
        die('404 - The file - '.$ctrlPath.' - not found');
    }
}
?>