<?php

require './Models/Model.php';
require './Controllers/Controller.php';
require "./Router.php";


$router = new Router();
$router->handleRoutes();