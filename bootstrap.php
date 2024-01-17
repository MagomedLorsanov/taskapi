<?php
require_once __DIR__ . '/vendor/autoload.php';

use api\v1\TaskController;



$controller = new TaskController();
$uri = $_SERVER['REQUEST_URI'];

// возвращаем все таски из бд
if ($uri === '/api/v1/task' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    header('Content-Type: application/json');
    echo json_encode($controller->getTasks());
}
// возвращаем таск по id из бд
elseif (preg_match('/^\/api\/v1\/task\/(\d+)$/', $uri, $matches) && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $taskId = $matches[1];
    header('Content-Type: application/json');
    $task = $controller->getTaskById($taskId);
    if ($task == 'false') {
        header("HTTP/1.1 404 Not Found");
        exit('404 Not Found');
    }
    echo json_encode($task[0]);
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
