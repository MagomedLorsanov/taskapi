<?php
require_once __DIR__ . '/vendor/autoload.php';

use api\config\Database;
use api\v1\TaskController;


$database = new Database('localhost', 'tasks', 'dorf', '1234');
$controller = new TaskController($database);
$uri = $_SERVER['REQUEST_URI'];

// возвращаем все таски из бд
if ($uri === '/api/v1/task' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo $controller->getTasks();
}
// возвращаем таск по id из бд
elseif (preg_match('/^\/api\/v1\/task\/(\d+)$/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $taskId = $matches[1];
    header('Content-Type: application/json');
    $task = $controller->getTaskById($taskId);
    if($task == 'false') {
        header("HTTP/1.1 404 Not Found");
        exit('404 Not Found');
    }
    echo $task;
}
// загружаем сгенерированные данные в бд
elseif ($uri === '/api/v1/gdata') {
    header('Content-Type: application/json');
    echo $controller->storeTasks();
} else {
    // Если путь не совпадает ни с одним из вышеопределенных маршрутов, возвращаем 404
    header("HTTP/1.1 404 Not Found");
    exit('404 Not Found');
}
