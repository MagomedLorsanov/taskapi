<?php

namespace api\v1;

class TaskController
{
    private $database;

    public function __construct($database)
    {
        $this->database = $database;
    }

    public function getTasks()
    {
        $tasks = $this->database->getTasks();
        return json_encode($tasks);
    }

    public function storeTasks()
    {
        $message = $this->database->storeTasks();
        return $message;
    }

    public function getTaskById($taskId)
    {
        $task = $this->database->getTaskById($taskId);
        return json_encode($task);
    }
}
