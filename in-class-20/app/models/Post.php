<?php
namespace app\models;

//using the database class namespace
use app\models\Model;

class Post extends Model {

    // public function getAllPostsByNameOrEmail($name, $email) {
    //     $query = "select * from posts WHERE CONCAT(firstName,' ',lastName) like :name or email like :email";
    //     return $this->query($query, [
    //         'name' => '%' . $name . '%',
    //         'email' => '%' . $email . '%',
    //     ]);
    // }

    public function getAllPosts() {
        $query = "select * from posts";
        return $this->query($query);
    }

    public function getPostById($id){
        $query = "select * from posts where id = :id";
        return $this->query($query, ['id' => $id]);
    }

    public function savePost($inputData){
        $query = "insert into posts (comm, likes) values (:comm, :likes);";
        return $this->query($query, $inputData);
    }

    public function updatePost($inputData){
        $query = "update posts set comm = :comm, likes = :likes where id = :id";
        return $this->query($query, $inputData);
    }

    public function deletePost($inputData){
        $query = "DELETE FROM posts where id = :id";
        return $this->query($query, $inputData);
    }
}
