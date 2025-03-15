<?php
    use Controller\Controller;
    class Router{
        public function handleRoutes(){
            $url = strtok($_SERVER['REQUEST_URI'], '?');
            $uriArray = explode("/", $url);
            $this->userRoutes($uriArray);
        }

        public function userRoutes($uriArray){
            if($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET'){
                require '../views/frontEnd.html';
            }

            if($uriArray[1] === 'work' && $_SERVER['REQUEST_METHOD'] === 'POST'){
                $control = new Controller();
                $control->checkTitle();
            }
        }
    }


?>