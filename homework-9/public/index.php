<?php
require_once "../app/models/Model.php";
require_once "../app/models/Game.php";
require_once "../app/controllers/GameController.php";

//set our env variables, remember con
$env = parse_ini_file('../.env');
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
        $gameController->getGames();
    }
}

if ($uriArray[1] === 'games' && $_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = isset($uriArray[2]) ? intval($uriArray[2]) : null;
    $gameController = new GameController();

    if ($id) {

        $gameController->gameDetailsView();
    } else {
        $gameController->gamesView();
    }

}

//views

if ($uriArray[1] === '') {
    require './views/game/games.html';
}
exit();

?>