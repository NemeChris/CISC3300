<?php

namespace app\controllers;

use app\models\Post;

class PostController
{
    public function validatePost($inputData) {
        $errors = [];
        $comm = $inputData['comm'];
        $likes = $inputData['likes'];

        if ($comm) {
            $comm = htmlspecialchars($comm, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($comm) < 2) {
                $errors['commShort'] = 'comment is too short';
            }
        } else {
            $errors['requiredComm'] = 'comment is required';
        }

        if ($likes) {
            $likes = htmlspecialchars($likes, ENT_QUOTES|ENT_HTML5, 'UTF-8', true);
            if (strlen($likes) < 1) {
                $errors['likesShort'] = 'likes are too short';
            }
        } else {
            $errors['requiredLikes'] = 'likes are required';
        }


        if (count($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }
        return [
            'comm' => $comm,
            'likes' => $likes,
        ];
    }

    public function getAllPosts() {
        $postModel = new Post();
        header("Content-Type: application/json");
        $posts = $postModel->getAllPosts();

        echo json_encode($posts);
        exit();
    }

    public function getPostByID($id) {
        $postModel = new Post();
        header("Content-Type: application/json");
        $post = $postModel->getPostById($id);
        echo json_encode($post);
        exit();
    }

    public function savePost() {
        $inputData = [
            'comm' => $_POST['comm'] ?: null,
            'likes' => $_POST['likes'] ?: null,
        ];
        $postData = $this->validatePost($inputData);

        $post = new Post();
        $post->savePost(
            [
                'comm' => $postData['comm'],
                'likes' => $postData['likes'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function updatePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        //no built-in super global for PUT
        parse_str(file_get_contents('php://input'), $_PUT);

        $inputData = [
            'comm' => $_PUT['comm'] ?: null,
            'likes' => $_PUT['likes'] ?: null,
        ];
        $postData = $this->validatePost($inputData);
        //we could save the data off to be saved here

        $post = new Post();
        $post->updatePost(
            [
                'id' => $id,
                'comm' => $postData['comm'],
                'likes' => $postData['likes'],
            ]
        );

        http_response_code(200);
        echo json_encode([
            'success' => true
        ]);
        exit();
    }

    public function deletePost($id) {
        if (!$id) {
            http_response_code(404);
            exit();
        }

        $post = new Post();
        $post->deletePost(
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

    public function postsView() {
        include '../public/assets/views/post/posts-view.html';
        exit();
    }

    public function postsAddView() {
        include '../public/assets/views/post/posts-add.html';
        exit();
    }

    public function postsDeleteView() {
        include '../public/assets/views/post/posts-delete.html';
        exit();
    }

    public function postsUpdateView() {
        include '../public/assets/views/post/posts-update.html';
        exit();
    }


}