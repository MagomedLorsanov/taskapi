<?php

namespace api\v1;

use api\model\Task;

class TaskController
{
    protected $task;
    
    public function __construct()
    {
        $this->task = new Task;
    }

    public function getTasks()
    {
        $task = $this->task->raw('SELECT id, title, `date` FROM tasks');
        return $task;
    }

    public function storeTasks()
    {
        $currentDate = date('Y-m-d H:i:s');
        for ($id = 1; $id <= 1000; $id++) {
            $this->task->setTitle('Задача ' . $id);
            $this->task->setDate(date('Y-m-d H:i:s', strtotime($currentDate .  "$id hour")));
            $this->task->setAuthor("Автор  $id");
            $this->task->setStatus("Статус  $id");
            $this->task->setDescription("Описание  $id");
            $this->task->store();
        }
    }

    public function getTaskById($taskId)
    {
        $task = $this->task->find('id', $taskId,true);
        return $task;
    }
}
