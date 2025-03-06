<?php

use Controller\Controller;

class Router{

    public function handleRoutes() {

        //get URI without query string
        $url = strtok($_SERVER["REQUEST_URI"], '?');

        //split url into array
        $uriArray = explode("/", $url);

        $this->userRoutes($uriArray);
    }

    public function userRoutes($uriArray) {
        if ($uriArray[1] === 'posts' && $_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController = new Controller();
            $userController->getUsers();
        }
    }
}