<?php
$page = $_GET['page'] ?? 'register'; // default page = register

require_once __DIR__ . "/controllers/PageController.php";
$controller = new PageController();

switch ($page) {
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'dashboard':
        $controller->dashboard();
        break;
    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}
