<?php

namespace app\controllers;

use app\models\Game;

class GameController
{
    public function validateGame($inputData) {
        $errors = [];
        $name = $inputData['name'];
        $year = $inputData['year'];
        $price = $inputData['price'];

        if ($name) {
            $name = htmlspecialchars($name, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($name) < 2) {
                $errors['nameShort'] = 'name is too short';
            }
        } else {
            $errors['requiredName'] = 'Name is required';
        }

        if ($year) {
            $year = htmlspecialchars($year, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($year) < 4) {
                $errors['yearShort'] = 'year is too short';
            }
        } else {
            $errors['requiredLikes'] = 'year is required';
        }

        if ($price) {
            $price = htmlspecialchars($price, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($price) < 3) {
                $errors['priceShort'] = 'price is too short';
            }
        } else {
            $errors['requiredPrice'] = 'price is required';
        }

        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'name' => $name,
            'year' => $year,
            'price' => $price
        ];
    }

    public function getAllGames() {
        $gameModel = new Game();
        header("Content-Type: application/json");
        $games = $gameModel->getAllGames();

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

    public function getGameByTitle() {
        $gameModel = new Game();
        header("Content-Type: application/json");
        $gameTitle = $_GET['gameTitle'];
        $game = $gameModel->getGameByTitle($gameTitle);
        echo json_encode($game);
        exit();
    }

    public function saveGame() {
        $inputData = [
            'name' => $_POST['name'] ?: null,
            'year' => $_POST['year'] ?: null,
            'price' => $_POST['price'] ?: null,
        ];
        $gameData = $this->validateGame($inputData);

        $game = new Game();
        $game->saveGame(
            [
                'name' => $gameData['name'],
                'year' => $gameData['year'],
                'price' => $gameData['price']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updateGame($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'name' => $_PUT['name'] ?: null,
            'year' => $_PUT['year'] ?: null,
            'price' => $_PUT['price'] ?: null
        ];
        $gameData = $this->validateGame($inputData);
        //we could save the data off to be saved here

        $game = new Game();
        $game->updateGame(
            [
                'id' => $id,
                'name' => $gameData['name'],
                'year' => $gameData['year'],
                'price' => $gameData['price']
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deleteGame($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $game = new Game();
        $game->deleteGame(
            [
                'id' => $id,
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function gamesView() {
        include '../public/assets/views/game/games-view.html';
        exit();
    }

    public function gamesAddView() {
        include '../public/assets/views/game/games-add.html';
        exit();
    }

    public function gamesDeleteView() {
        include '../public/assets/views/game/games-delete.html';
        exit();
    }

    public function gamesSearchView() {
        include '../public/assets/views/game/game-search-view.html';
        exit();
    }

    public function gamesUpdateView() {
        include '../public/assets/views/game/games-update.html';
        exit();
    }


}