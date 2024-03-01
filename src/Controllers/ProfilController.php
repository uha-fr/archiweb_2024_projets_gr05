<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\User;
use UHA\Repositories\UserRepository;

class ProfilController extends Controller {

    public function profil(){
        $this->view->setTemplateFile('profil/profil.phtml');
        return $this->view->output();
    }

    

}
?>