<?php

namespace app\controllers;

use app\models\Game;

class GameController
{
    public function getGames() {
        $gameModel = new Game();
        header("Content-Type: application/json");
        $query = !empty($_GET['name']) ? $_GET['name'] : null;
        $games = $gameModel->getGames($query);

        echo json_encode($games);
        exit();
    }

    public function getGameByID($id) {
        $gameModel = new Game();
        header("Content-Type: application/json");
        $game = $gameModel->getGameById($id);
        echo json_encode($game);
        exit();
    }

    // public function gamesView() {
    //     include '../public/assets/views/game/games.html';
    //     exit();
    // }

    public function gameDetailsView() {
        //include '../../public/views/game/gameDetails.html';
        include './views/game/gameDetails.html';
        exit();
    }

    public function savePost() {
        //post->savePost()
        //post->getLatestPost() = newly saved post
        //redirect via the id from the newly saved post
        exit();
    }

}