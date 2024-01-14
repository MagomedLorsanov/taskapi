<?php

namespace api\config;

use PDO;

class Database
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;

    public function __construct($host, $dbname, $username, $password)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public function getTasks()
    {
        $query = "SELECT id, title, date FROM tasks LIMIT 1000";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTaskById($taskId)
    {
        $query = "SELECT id, title, date FROM tasks WHERE id = :task_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':task_id', $taskId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function storeTasks()
    {
        $query = "INSERT INTO tasks ( title, date, author, status, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $currentDate = date('Y-m-d H:i:s');

        for ($id = 1; $id <= 1000; $id++) {
            $title = 'Задача ' . $id;
            $date = date('Y-m-d H:i:s', strtotime($currentDate .  "+$id hour"));
            $author = "Автор + $id";
            $status = "Статус + $id";
            $description = "Описание + $id";
            $stmt->execute([$title, $date, $author, $status, $description]);
        }

        return 'Генерация задач завершена!';
    }
}
