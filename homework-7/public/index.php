<?php
    header("Access-Control-Allow-Origin: *");
    require '../controllers/Controller.php';
    require '../Router.php';

    $router = new Router();
    $router->handleRoutes();
?>