<?php
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    require 'in-class-13.html';

    exit();
}
if ($uriArray[1] === 'mine' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $film = [
           'Name' => 'Goodfellas',
           'Type' => 'Film' 
        ];

    echo json_encode($film);
    exit();
}

?>