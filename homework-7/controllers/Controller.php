<?php
    header("Access-Control-Allow-Origin: *");
    
    namespace Controller;
    class Controller{
        public function checkTitle(){
            $title = $_POST["title"];
            if(strlen($title) > 3){
                $okTitle = true;
            }else{
                $okTitle = false;
            }
            $this->CheckDescription();
        }

        public function checkDescription(){
            $description = $_POST["description"];
            if(strlen($description) > 10){
                $okDescription = true;
            }else{
                $okDescription = false;
            }
            $this->returnMessage();
        }

        public function returnMessage(){
            if($okTitle && $okDescription){
                $message = "Title and Description are good!";
            }else if (!$okTitle && $okDescription){
                $message = "Title must be more than 3 characters";
            }else if ($okTitle && !$okDescription){
                $message = "Description must be more than 3 characters";
            }else{
                $message = "Title and Description must be more than 3 characters";
            }
            echo json_encode($message);
        }
    }
?>