<?php
session_start();
date_default_timezone_set('America/Bogota');
ini_set('display_errors', 0);
require_once  'vendor/autoload.php';

//Cargamos configuraciones basicas
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();
define('ROOT', $_ENV['ROOT_APP']);
define('SERVER_HOST', $_ENV['SERVER_HOST']);
define('SITE',$_ENV['SERVER_HOST'].ROOT);

//Cargamos cambios ne bases de datos
$mysql = new Controllers\MysqlController();
$mysql->load();
//Define los elementos según la url
$url = explode("/", $_SERVER['REQUEST_URI']);
$module =$url[2];
$action =$url[3];
if (isset($action)) {
    $action =$url[3];
    if (isset($url[4])) {
        $parameter =$url[4];

    }
}

//Selecciona controladores segun elementos de url
switch ($module) {
    case 'documentos':
        if(!$_SESSION['id_usuario']){
            header("Location: ".ROOT);
        }
        $controller = new \Controllers\DocumentoController();
        if (isset($action)) {

            if (method_exists($controller, $action)) {
                if (isset($parameter)) {
                    $controller->$action($parameter);
                } else {
                    $controller->$action();
                }
            } else {
                include_once('views/404.php');
            }
        } else {
            include_once('views/404.php');
        }
        break;
        break;
    case 'login':
        $controller = new  \Controllers\GeneralController();
        if (isset($action)) {
            if (method_exists($controller, $action)) {
                if (isset($parameter)) {
                    $controller->$action($parameter);
                } else {
                    $controller->$action();
                }
                //$controller->login();
            } else {
                $controller->login();
            }
        } else {
            $controller->login();
        }
        break;
    case '':
        $controller = new \Controllers\GeneralController();
        $controller->login();
        break;
    default:
        include_once('views/404.php');
}