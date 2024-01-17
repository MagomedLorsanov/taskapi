<?php

namespace api\db;

use PDO;
use api\db\Config;

class Database
{
    protected int $id;
    protected array $fields = [];
    protected string $table;
    protected array $collection = [];
    protected $conn;

    private string $host;
    private string $dbname;
    private string $user;
    private string $password;
    public function __construct()
    {
        $config = new Config();
        $this->host = $config->get('host');
        $this->dbname = $config->get('dbname');
        $this->user = $config->get('user');
        $this->password = $config->get('password');
        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";

        try {
            $this->conn = new \PDO($dsn, $this->user, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    private function getTable(): string
    {
        return $this->table;
    }

    public function find(string $column, mixed $value, bool $many = false): array|bool|Database
    {
        $query = "SELECT * FROM `" . $this->getTable() . "` WHERE `$column` = :$column";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([
            $column => $value
        ]);
        if ($many) {
            $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $this->collection;
        } else {
            $entity = $stmt->fetch(\PDO::FETCH_ASSOC);
            if (!$entity) {
                return false;
            }
            foreach ($entity as $key => $value) {
                $this->$key = $value;
            }

            return $this;
        }
    }

    public function all(): array|bool|Database
    {
        $query = "SELECT * FROM " . $this->getTable();
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->collection;
    }

    public function raw(string $query, $params = []): array|bool|Database
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute([]);
        $this->collection = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $this->collection;
    }

    public function store(): void
    {

        $columns = implode(', ', array_map(function ($field) {
            return "`$field`";
        }, $this->fields));

        $binds = implode(', ', array_map(function ($field) {
            return ":$field";
        }, $this->fields));

        $query = "insert into `$this->table` ($columns)
            values ($binds)";

        $stmt = $this->conn->prepare($query);

        foreach ($this->fields as $field) {
            $params[$field] = $this->$field;
        }

        $stmt->execute($params);
    }


    public function storeTasks()
    {
        $query = "INSERT INTO tasks ( title, date, author, status, description) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $currentDate = date('Y-m-d H:i:s');

        for ($id = 1; $id <= 1000; $id++) {
            $title = 'Задача ' . $id;
            $date = date('Y-m-d H:i:s', strtotime($currentDate .  "$id hour"));
            $author = "Автор  $id";
            $status = "Статус  $id";
            $description = "Описание  $id";
            $stmt->execute([$title, $date, $author, $status, $description]);
        }

        return 'Генерация задач завершена!';
    }
}
