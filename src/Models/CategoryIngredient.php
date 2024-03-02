<?php
 namespace UHA\Models;

use UHA\Repositories\CategoryIngredientRepository;

 class CategoryIngredient extends Model{

    private $categorie_id;
    private $nom;

    public function __construct()
    {
        $this->setTable('categories_ingrédients');
        $this->repository = new CategoryIngredientRepository($this->table);
        
    }

    public function getCategorieId(){
        return $this->categorie_id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function getAll(){
        return $this->repository->getAll();
    }

 }