<?php

//we need this to accept requests from any domain
header("Access-Control-Allow-Origin: *");

$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//var_dump($uriArray);

if ($uriArray[1] === 'cats' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $cats = [
        [
            'name' => 'pinecone'
        ],
        [
            'name' => 'Mr'
        ]
    ];

    echo json_encode($cats);
    exit();
}

if ($uriArray[1] === 'low' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode([
        'message' => 'Success'
    ]);
    exit();
}


?>
