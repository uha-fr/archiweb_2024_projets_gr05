<?php
namespace UHA\Repositories;

use UHA\Services\Database;

class NutritionnisteRepository extends Repository{
    public function __construct($name){
        parent::__construct($name);
     }
     public function insert($nutritionniste) {
        try {
            $pdo = $this->database->getPDO();
            $query = "INSERT INTO " . $this->table . " (nom, prenom, specialite) VALUES (:nom, :prenom, :specialite)";
            $statement = $pdo->prepare($query);
            $statement->execute([
                ':nom' => $nutritionniste->getNom(),
                ':prenom' => $nutritionniste->getPrenom(),
                ':specialite' => $nutritionniste->getSpecialite(),
            ]);
            return true; // Insertion réussie
           
        } catch (\PDOException $e) {
            echo "Insertion failed: " . $e->getMessage();
            return false; // Échec de l'insertion
        }
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
            $result = $statement->fetchAll(\PDO::FETCH_CLASS, 'UHA\Models\Nutritionniste');
            return $result;
        } catch (\PDOException $e) {
            echo "Query failed: " . $e->getMessage();
        }
     }
     

}