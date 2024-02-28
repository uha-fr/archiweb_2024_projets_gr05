<?php
namespace UHA\Controllers;
use UHA\Controllers\Controller;
use UHA\Models\User;
use UHA\Repositories\UserRepository;

class UserController extends Controller {
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
}
?>