<?php
require_once "../app/models/Model.php";
require_once "../app/models/Game.php";
require_once "../app/controllers/GameController.php";

//set our env variables
$env = parse_ini_file('../.env');
//['DBHOST' => 'test', ]
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);

use app\controllers\GameController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = Games
//2 = 1


//get all or a single Game
if ($uriArray[1] === 'api' && $uriArray[2] === 'games' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    //only id
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $gameController = new GameController();

    if ($id) {
        $gameController->getGameByID($id);
    } else {
        $gameController->getAllGames();
    }
}

if ($uriArray[1] === 'games' && $uriArray[2] === 'api' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new GameController();
    $gameController->getGameByTitle();
}


//save game
if ($uriArray[1] === 'api' && $uriArray[2] === 'games' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $gameController = new GameController();
    $gameController->saveGame();
}

//update Game
if ($uriArray[1] === 'api' && $uriArray[2] === 'games' && $_SERVER['REQUEST_METHOD'] === 'PUT') {
    $gameController = new GameController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $gameController->updateGame($id);
}

//delete Game
if ($uriArray[1] === 'api' && $uriArray[2] === 'games' && $_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $gameController = new GameController();
    $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
    $gameController->deleteGame($id);
}

//views


if ($uri === '/new-game' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new GameController();
    $gameController->gamesAddView();
}

if ($uriArray[1] === 'games' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new GameController();
    $gameController->GamesUpdateView();
}

if ($uriArray[1] === 'delete-game' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new gameController();
    $gameController->gamesDeleteView();
}

if ($uriArray[1] === 'view-search' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new GameController();
    $gameController->gamesSearchView();
}

if ($uriArray[1] === '' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $gameController = new GameController();
    $gameController->gamesView();
}

include '../public/assets/views/notFound.html';
exit();

?>
