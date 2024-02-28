<?php
    namespace Routes;
    use \UHA\Controllers\EmployeeController;
use UHA\Controllers\UserController;
use \UHA\Routing\Web;

    class Processor{
        public function __construct()
        {
            $router = new Web();
            $router->addRoute('GET', '/employee', function () {
                return (new EmployeeController())->list();
            });
            $router->addRoute('GET', '/employee/test', function () {
                return (new EmployeeController())->testContent();
            });
            $router->addRoute('GET', '/login', function () {
                return (new UserController())->login();
            });

            $router->processRequest();
        }
    }
   
    
?>