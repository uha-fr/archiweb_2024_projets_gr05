<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\User;
use UHA\Repositories\UserRepository;

class LoginController extends Controller {

    public function index(){
        $this->view->setTemplateFile('login/login.phtml');
        return $this->view->output();
    }

}
?>