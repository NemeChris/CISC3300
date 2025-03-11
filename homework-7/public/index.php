<?php
    require '../frontEnd.html';
    require '../contollers/Controller.php';
    require '../Router.php';

    $router = new Router();
    $router->handleRoutes();
?>