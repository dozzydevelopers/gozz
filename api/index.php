<?php
require_once 'config.php';
require_once 'db_connection.php';

// Main API Router
$method = getRequestMethod();
$path = getRequestPath();

// Route requests
switch ($path) {
    case '/categories':
        require_once 'categories.php';
        break;
    
    case '/nfts':
        require_once 'nfts.php';
        break;
    
    case '/collections':
        require_once 'collections.php';
        break;
    
    case '/users':
        require_once 'users.php';
        break;
    
    case (preg_match('/^\/users\/(.+)$/', $path, $matches) ? true : false):
        $_GET['userId'] = $matches[1];
        require_once 'users.php';
        break;
    
    case '/nfts/purchase':
        require_once 'nfts.php';
        break;
    
    default:
        sendError('Endpoint not found', 404);
        break;
}
?>