<?php
    namespace Routes;
    use \UHA\Controllers\EmployeeController;
    use \UHA\Controllers\LoginController;
    use \UHA\Controllers\HomeController;
    use \UHA\Controllers\ProfilController;
    use \UHA\Routing\Web;

    class Processor{
        public function __construct()
        {
            $router = new Web();
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