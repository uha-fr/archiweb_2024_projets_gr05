<?php
namespace Routes;
use \UHA\Controllers\EmployeeController;
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
        $router->addRoute('GET', '/user', function () {
            return (new UserController())->add();
        });
        $router->addRoute('GET', '/', function () {
            return (new LoginController())->index();
        });
        $router->addRoute('GET', '/home', function () {
            return (new HomeController())->index();
        });


        $router->processRequest();
    }
}
   
    
?>