<?php
namespace UHA\Repositories;

use UHA\Services\Database;

abstract class Repository{
    protected $table; 
    protected $database;
    abstract function getAll();

    public function __construct($table) {
        $this->database = new Database();
        $this->table=$table;
    }
    
}

?>