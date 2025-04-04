<?php

namespace app\models;

class Game extends Model {

    public function getGames($name) {
        if ($name) {
            $query = "select * from games WHERE name like :name";
            return $this->fetchAllWithParams($query, ['name' => '%' . $name . '%']);
        }
        $query = "select * from games";
        return $this->fetchAll($query);
    }

    public function getGameById($id){
        $query = "select * from games where id = :id";
        return $this->fetchAllWithParams($query, ['id' => $id])[0] ?? null;
    }
}