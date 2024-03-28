<?php
    namespace UHA\Controllers;
    use Views\Template;
    use Http\Web;
use UHA\Services\SecurityGuard;

class Controller{
    protected $view;
    protected $securityGuard;
    public function __construct()
    {
        $this->view = new Template();
        $this->securityGuard = new SecurityGuard();
    }
}
?>