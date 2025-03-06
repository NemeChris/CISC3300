<?php
namespace Controller;
use Models\Model;
class Controller
{
    public function getUsers() {
        $params = [
            'name' => $_GET['name'] ?? null,
        ];
        $userModel = new Model();

        header("Content-Type: application/json");
        $users = $userModel->getAllUsersByName($params);
        echo json_encode($users);
        exit();
    }
}
