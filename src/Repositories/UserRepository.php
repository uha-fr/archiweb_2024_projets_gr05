<?php
namespace UHA\Repositories;

use UHA\Services\Database;

class UserRepository{
protected $pdo;
public $table = 'employee'; 

public function  __construct(){
   $database = new Database();
   $this->pdo =  $database->getPDO();
}

public function getAll(){
    $selectDataSQL = "SELECT * FROM ".$this->table;
    // echo 'h'.$this->table;
    $statement = $this->pdo->query($selectDataSQL);    
    // Fetch all rows as an associative array
    $result = $statement->fetchAll(\PDO::FETCH_ASSOC);
    // Display the result
    return $result;
}

/**
 * Get the value of table
 */ 
public function getTable()
{
   return $this->table;
}

/**
 * Set the value of table
 *
 * @return  self
 */ 
public function setTable($table)
{
   $this->table = $table;

   return $this;
}
}
?>