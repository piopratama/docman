<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

session_start();

// Full request URI, e.g., /docman/login
$requestUri = $_SERVER['REQUEST_URI'];

// Script name, e.g., /docman/index.php
$scriptName = $_SERVER['SCRIPT_NAME'];

// Get the base directory of the script, removing any file name
$baseDir = dirname($scriptName);

// Remove base directory from request URI for routing
$request = substr($requestUri, strlen($baseDir));

// Use parse_url to get just the path component of the URI
$request = parse_url($request, PHP_URL_PATH);

// Trim leading and trailing slashes
$request = ltrim($request, '/');

$controller = null;
$action = 'index';  // default action

// Map routes to controller and actions
switch ($request) {
    case '':
        $controller = 'LoginController';
        break;
    case 'authenticate':
        $controller = 'LoginController';
        $action = 'authenticate';
        break;
    case 'dashboard':
        $controller = 'DashboardController';
        break;
    case 'admin/user':
        $controller = 'UserController';
        break;
    default:
        echo '404 Not found';
        exit;
}

// Dynamically require the controller file
require_once __DIR__ . "/controllers/{$controller}.php";

// Dynamically instantiate the controller and call the action method
$controllerInstance = new $controller();
$controllerInstance->$action();