<?php
/**
 * Punto de ingreso a la aplicación.
 * 
 * Permite acceder a la aplicación mediante un solo punto de acceso.
 * Implementa el patrón de diseño Panel de control así como ayuda a implementar
 * el patrón de diseño MVC.
 *  
 * @author PHPCODE2021
 * @version 1.0
 * @package System
 */
require_once 'config.php';
$s = isset($_GET['s']) ? $_GET['s'] : 1; // System  0=Portal 1=Application
$c = isset($_GET['c']) ? $_GET['c'] : 'NotFound'; // Controller
$m = isset($_GET['m']) ? $_GET['m'] : 'index'; // Model action
$c = $c . 'Controller';

if(file_exists(CONTROLLER . $c . '.php')){
    require_once CONTROLLER . $c . '.php';
    if(method_exists($c, $m)){
        $c = new $c;
        call_user_func( array($c,$m) );
    }else{
        $ec = 'NotFoundController';
        require_once CONTROLLER . $ec . '.php';
        $ec = new $ec;
        $message = 'Error : En el controlador "'. $c .'", el metodo "'.$m.'()" no existe.';
        call_user_func_array(array($ec,'withoutController'), array($message));
        die();
    }    
}else{
    $ec = 'NotFoundController';
    require_once CONTROLLER . $ec . '.php';
    $ec = new $ec;
    $message = 'Error : El controlador "'. $c .'" no existe.';
    call_user_func_array(array($ec,'withoutController'), array($message));
    die();
}

?>