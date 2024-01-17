<?php 

namespace api\model;

use api\db\Database;

class Task extends Database {
    protected string $table = 'tasks';
    protected string $title;
    protected string $date;
    protected string $author;
    protected string $status;
    protected string $description;

    protected array $fields = ['title', 'date', 'author', 'status', 'description'];

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
}