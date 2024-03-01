<?php
    namespace Routes;
    use \UHA\Controllers\EmployeeController;
use UHA\Controllers\NutritionnisteController;
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
            // Gestion routes pour nutritionniste
            $router->addRoute('GET', '/nutritionniste', function () {
                return (new NutritionnisteController())->form();
            });
            
            $router->addRoute('GET', '/nutritionniste/update/{id}', function ($id) {
                return (new NutritionnisteController())->update($id);
            });
            
            $router->addRoute('GET', '/nutritionniste/list', function () {
                return (new NutritionnisteController())->list();
            });
           
            $router->addRoute('POST', '/nutritionniste/add', function () {
                return (new NutritionnisteController())->add();
            });

            $router->processRequest();
        }
    }
   
    
?>