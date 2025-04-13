<?php
namespace app\models;

//using the database class namespace
use app\models\Model;

class Game extends Model {

    // public function getAllGamesByNameOrEmail($name, $email) {
    //     $query = "select * from games WHERE CONCAT(firstName,' ',lastName) like :name or email like :email";
    //     return $this->query($query, [
    //         'name' => '%' . $name . '%',
    //         'email' => '%' . $email . '%',
    //     ]);
    // }

    public function getAllGames() {
        $query = "select * from games";
        return $this->query($query);
    }

    public function getGameById($id){
        $query = "select * from games where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function getGameByTitle($name){
        $query = "select * from games where name like :name";
        return $this->query($query, ['name' => '%' . $name . '%']);
    }

    public function saveGame($inputData){
        $query = "insert into games (name, year, price) values (:name, :year, :price);";
        return $this->query($query, $inputData);
    }

    public function updateGame($inputData){
        $query = "update games set name = :name, year = :year, price = :price where id = :id";
        return $this->query($query, $inputData);
    }

    public function deleteGame($inputData){
        $query = "DELETE FROM games where id = :id";
        return $this->query($query, $inputData);
    }
}
