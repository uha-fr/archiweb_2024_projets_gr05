<?php
namespace UHA\Controllers;

use UHA\Models\Nutritionniste;
use UHA\Controllers\Controller;
use UHA\Repositories\NutritionnisteRepository;
session_start();

class NutritionnisteController extends Controller{
   
   
    public function form(){
        $this->view->setTemplateFile('nutritionnistes/add.phtml');
        return $this->view->output();
    }
  
    public function update($id) {
        try {
            // Récupérer le nutritionniste à modifier par son ID
            $nutritionnisteRepository = new NutritionnisteRepository('nutritionnistes');
            $nutritionniste = $nutritionnisteRepository->getById($id);
            var_dump($nutritionniste);
    
            // Vérifier si le nutritionniste a été trouvé
            if ($nutritionniste) {
                // Passer les données du nutritionniste à la vue
                $this->view->set('nutritionniste', $nutritionniste);
                $this->view->setTemplateFile('nutritionnistes/update.phtml');
                return $this->view->output();
            } else {
                // Gérer le cas où le nutritionniste n'a pas été trouvé
                // Rediriger ou afficher un message d'erreur
            }
        } catch (\Exception $e) {
            // Gérer les erreurs
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }
    
    public function list() {
        try {
            
            $nutritionnisteRepository = new NutritionnisteRepository('nutritionnistes');
            $nutritionnistes = $nutritionnisteRepository->getAll();
           
            $this->view->setTemplateFile('nutritionnistes/liste.phtml');
            $this->view->set('nutritionnistes', $nutritionnistes);
            //var_dump($nutritionnistes);
            return $this->view->output();
        } catch (\Exception $e) {
            // Gérer les erreurs
            echo "Une erreur s'est produite : " . $e->getMessage();
        }
    }
    
    
    
   
    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ajout'])) {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $specialite = $_POST['specialite'];

            $nutritionniste = new Nutritionniste();
            $nutritionniste->setNom($nom);
            $nutritionniste->setPrenom($prenom);
            $nutritionniste->setSpecialite($specialite);

            $nutritionnisteRepository = new NutritionnisteRepository('nutritionnistes');
            $success = $nutritionnisteRepository->insert($nutritionniste);

            if ($success) {
                $_Session['successMessage'] = 'Les données ont été ajoutées avec succès.';
                $this->view->setTemplateFile('nutritionnistes/add.phtml');
              //  $this->view->set('successMessage', $successMessage);
              header('Location:/nutritionniste/list');
            } else {
                $_SESSION['Errosmessage'] = 'Insertion non réussie.';

                header("Location: /nutritionniste");
            }

            return $this->view->output();
        } else {
            $this->view->setTemplateFile('nutritionnistes/add.phtml');
            return $this->view->output();
        }
    }

    public function all(){
        $this->view->setTemplateFile('nutritionnistes/all.phtml');
        return $this->view->output();
    }
}
