<?php
    use Controller\Controller;
    class Router{
        public function handleRoutes(){
            $uri = strtok($_SERVER["REQUEST_URI"], '?');
            $uriArray = explode("/", $uri);
            $this->userRoutes();
        }

        public function userRoutes(){
            if($_SERVER["REQUEST_METHOD"] === "POST" && $uriArray[1] === "work"){
                $control = new Controller();
                $control->checkTitle();
            }
        }
    }


?>