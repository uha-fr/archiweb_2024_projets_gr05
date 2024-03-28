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

    public function find($query){
        try {
            $statement = $this->execute($query);
            $result = $statement->fetch(\PDO::FETCH_OBJ);
            return $result;
        } catch (\PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }

    public function execute($query){
        $pdo = $this->database->getPDO();
        $this->table;
        $statement = $pdo->prepare($query);
        $statement->execute();

        return $statement;
    }

    public function edit($query){
        try {
            $statement = $this->execute($query);
            $rowCount = $statement->rowCount();
            return $rowCount > 0 ;
        } catch (\PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }


    
}

?>