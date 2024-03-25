<?php
namespace UHA\Repositories;
use UHA\Services\Database;

class CategoryIngredientRepository extends Repository {

    public function __construct($name){
        parent::__construct($name);
     }

    public function insert($categoryIngredient){
        try {
            $pdo = $this->database->getPDO();
            $query = "INSERT INTO " . $this->table . " (nom) VALUES (:nom)";
            $statement = $pdo->prepare($query);
            $statement->execute([
                ':nom' => $categoryIngredient->getNom()
                
            ]);
            return true; // Insertion réussie
           
        } catch (\PDOException $e) {
            echo "Insertion failed: " . $e->getMessage();
            return false; // Échec de l'insertion
        }

    }

    public function getAll()
    {
        try {
            $pdo = $this->database->getPDO();
            $this->table;
            
            $query = "SELECT * FROM ".$this->table;
            
            // Prepare and execute the query
            $statement = $pdo->prepare($query);
            $statement->execute();
            
            // Fetch all rows as object class 
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, 'UHA\Models\CategoryIngredient');
            return $result;
        } catch (\PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
    }
}