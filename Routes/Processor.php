<?php
    namespace Routes;

use UHA\Controllers\CategoryIngredientController;
use \UHA\Controllers\EmployeeController;
use UHA\Controllers\NutritionnisteController;
use UHA\Controllers\UserController;
use \UHA\Routing\Web;
use \UHA\Controllers\HomeController;
use \UHA\Controllers\LoginController;

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
        
            $router->addRoute('GET', '/nutritioniste/all', function () {
                return (new NutritionnisteController())->all();
            });
            $router->addRoute('GET', '/user/{id}', function ($id) {
                return (new UserController())->view($id);
            });
            $router->addRoute('GET', '/login', function () {
                return (new UserController())->login();
            });
            $router->addRoute('GET', '/user', function () {
                return (new UserController())->add();
            });
            $router->addRoute('GET', '/', function () {
                return (new LoginController())->index();
            });
            $router->addRoute('GET', '/home', function () {
                return (new HomeController())->index();
            });

            //Gestion category Ingredient
            $router->addRoute('GET', '/catingredient', function () {
                return (new CategoryIngredientController())->form();
            });
            $router->addRoute('POST', '/catingredient/add', function () {
                return (new CategoryIngredientController())->add();
            });
            $router->addRoute('GET', '/catingredient/list', function () {
                return (new CategoryIngredientController())->list();
            });

            $router->processRequest();
        }
    }
   
    
?>