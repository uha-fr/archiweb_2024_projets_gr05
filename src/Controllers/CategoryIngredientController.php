<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\CategoryIngredient;
use UHA\Repositories\CategoryIngredientRepository;

session_start();

class CategoryIngredientController extends Controller {

    public function form(){
        $this->view->setTemplateFile('categoryIngredient/add.phtml');
        return $this->view->output();
    }

    public function list(){
       try{
            $categoryIngredientRepositoy = new CategoryIngredientRepository('categories_ingrédients');
            $categoryIngredient = $categoryIngredientRepositoy->getAll();

            $this->view->setTemplateFile('categoryIngredient/liste.phtml');
            $this->view->set('categoryIngredient', $categoryIngredient);
           return  $this->view->output();
       }catch (\Exception $e) {
        // Gérer les erreurs
        echo "Une erreur s'est produite : " . $e->getMessage();
    }
 }

    function add(){
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajout'])){

            $category = $_POST['category'];

            $categoryIngredient = new CategoryIngredient();
            $categoryIngredient->setNom($category);

            $categoryIngredientRepository = new CategoryIngredientRepository('categories_ingrédients');

            if($categoryIngredientRepository->insert($categoryIngredient)){
                $_SESSION['message']= 'Insertion réussie avec succès !';
                header('Location:/catingredient');
            }else{
                $_SESSION['message']= 'Insertion non  réussie  !';
                header('Location:/catingredient');

            }
        }
        
    }
}