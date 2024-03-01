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

     public function getById($id) {
        try {
            $pdo = $this->database->getPDO();
            $query = "SELECT * FROM " . $this->table . " WHERE nutritionniste_id = :id";
            $statement = $pdo->prepare($query);
            $statement->execute([':id' => $id]);
            $nutritionniste = $statement->fetch(\PDO::FETCH_ASSOC);

            // Vérifiez si le nutritionniste a été trouvé
            if ($nutritionniste) {
                return $nutritionniste;
            } else {
                // Gérer le cas où le nutritionniste n'a pas été trouvé
                return null;
            }
        } catch (\PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return null;
        }
    }
     

}