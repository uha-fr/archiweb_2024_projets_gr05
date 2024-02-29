<?php 
namespace UHA\Models;
use Doctrine\ORM\Mapping as ORM;
use UHA\Repositories\NutritionnisteRepository;

class Nutritionniste extends Model {
    private $id;
    private $nom;
    private $prenom;
    private $specialite;

    // Constructeur
    public function __construct()
    {
        parent::__construct();
        $this->setTable("nutritionnistes");
        $this->repository = new NutritionnisteRepository($this->table);
    }
   
    // Méthodes getters et setters
    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getSpecialite() {
        return $this->specialite;
    }

    public function setSpecialite($specialite) {
        $this->specialite = $specialite;
    }
    public function getAll(){
        return $this->repository->getAll();
    }
}

?>
