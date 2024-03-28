<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\User;
use UHA\Repositories\UserRepository;
use UHA\Security\Authenticator;

class UserController extends Controller {

    public function login(){
        $this->view->setTemplateFile('login.phtml');
        return $this->view->output();
    }

    public function loginProcess(){
        $email = $_POST["email"];
        $password = $_POST["password"];

        // print_r($password);

        if(($user=$this->securityGuard->authenticate($email,$password)) != null){
            $this->securityGuard->storeInSession($user);
            header("Location: /home");
        } else{
            $_SESSION["message"] = "Mot de passe ou erroné";
            header("Location: /login");
        }
    }


    public function auth(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($password);
        if(Authenticator::authenticate($user)){
            header("Location: /");
        } else {
            session_start();
            $_SESSION['message'] = 'Une erreur s\'est produite. Contacter l\'administrateur.';

            header("Location: /login");
        }
    }
    public function list(){
        $holla = ['fin','ger','l'];
        $this->view->setTemplateFile('base.phtml');
        $this->view->set('hello','he');
        $this->view->set('hi',$holla);
        return $this->view->output();
    }

    public function testContent(){
        // $user = new UserRepository();
        // $user->getAll();
        $this->view->setTemplateFile('index.phtml');
        return $this->view->output();
    }

    public function add()
    {
        $this->view->setTemplateFile('addUser.phtml');
        return $this->view->output();
    }

    public function view($id){
        echo $id;
    }
}
?>