<?php
namespace UHA\Repositories;

use UHA\Services\Database;

class UserRepository extends Repository{

public function __construct($name){
   parent::__construct($name);
}

public function getAll(){
   try {
       $pdo = $this->database->getPDO();
       $this->table;
       
       $query = "SELECT * FROM ".$this->table;
       
       // Prepare and execute the query
       $statement = $pdo->prepare($query);
       $statement->execute();
       
       // Fetch all rows as object class 
       $result = $statement->fetchAll(\PDO::FETCH_CLASS, 'UHA\Models\User');
       return $result;
   } catch (\PDOException $e) {
       echo "Query failed: " . $e->getMessage();
   }
}

public function getUserByEmail($email){
   try {
      $pdo = $this->database->getPDO();
      $this->table;
      $query = "SELECT * FROM ".$this->table." WHERE email = :email LIMIT 1";
      $statement = $this->database->getPDO()->prepare($query);
      $statement->bindParam(':email', $email);
      $statement->execute();
      $result = $statement->fetch(\PDO::FETCH_CLASS, 'UHA\Models\User');
      return $result;
  } catch (\PDOException $e) {
      echo "Query failed: " . $e->getMessage();
  }
}
} 


?>