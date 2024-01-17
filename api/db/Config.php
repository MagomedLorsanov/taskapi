<?php

namespace api\db;

class Config
{
    private $data;
    public function __construct(){
        $this->data =  include_once __DIR__ . '/../../config/database.php';
    }

   public function get($key) {
        return $this->data[$key] ?? null;
    }
}