<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\User;
use UHA\Repositories\UserRepository;

class HomeController extends Controller {

    public function index(){
        $this->view->setTemplateFile('home/home.phtml');
        return $this->view->output();
    }

    

}
?>