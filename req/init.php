<?php
date_default_timezone_set("America/Montreal");
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    
    // project-specific namespace prefix
    $prefix = 'App\\';
    
    // base directory for the namespace prefix
    $base_dir = __DIR__.'/../';
    
    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }
    
    // get the relative class name
    $relative_class = substr($class, $len);
    
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

 
$db_connector = mysqli_init( );
$db_connector->options( MYSQLI_OPT_CONNECT_TIMEOUT, 3 );
if (  @$db_connector->real_connect("",  '', '', '', "3306")  ){
    $db_connector->set_charset('utf8');
} else {
    unset($db_connector);
}


include __DIR__ . "/functions.php";
?>