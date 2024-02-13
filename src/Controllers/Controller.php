<?php
    namespace UHA\Controllers;
    use Views\Template;
    use Http\Web;
    
    class Controller{
        protected $view;
        public function __construct()
        {
            $this->view = new Template();
        }
    }
?>