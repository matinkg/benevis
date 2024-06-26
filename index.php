<?php

require_once 'config.php';
require_once 'database.php';
require_once 'helpers.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/global_helpers.php';

// Get the request URI
$request_uri = $_SERVER['REQUEST_URI'];

// Remove query string if present
$request_uri = strtok($request_uri, '?');

// Extract the path after index.php
$path = explode('/index.php', $request_uri)[1] ?? '';

// Remove leading slash if present
$path = ltrim($path, '/');

// Split the path into segments
$segments = explode('/', $path);

// Set default controller and method
$controller = 'Home';
$method = 'index';

// If controller is specified in the URL, use it
if (!empty($segments[0])) {
    $controller = ucfirst($segments[0]);
}

// If method is specified in the URL, use it
if (!empty($segments[1])) {
    $method = $segments[1];
}

// Build the controller class name
$controller_class = $controller . 'Controller';

// Check if the controller file exists
$controller_file = __DIR__ . '/controllers/' . $controller_class . '.php';

if (file_exists($controller_file)) {
    require_once $controller_file;
    
    if (class_exists($controller_class)) {
        $controller_instance = new $controller_class();
        
        if (method_exists($controller_instance, $method)) {
            // Call the method
            $controller_instance->$method();
        } else {
            // Method not found
            http_response_code(404);
            echo "Method not found";
        }
    } else {
        // Controller class not found
        http_response_code(404);
        echo "Controller not found";
    }
} else {
    // Controller file not found
    http_response_code(404);
    echo "Controller not found";
}