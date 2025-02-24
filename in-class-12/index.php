<?php

header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

$uriArray = explode("/", $uri);

if ($uriArray[1] === 'html' && $_SERVER['REQUEST_METHOD'] === 'GET') {
   echo '
   <p> Returned with php </p>
   ';
    exit();
}

if ($uriArray[1] === 'json' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}
?>