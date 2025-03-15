<?php

    //echo 'Reached Controller';
    namespace Controller;
    header("Access-Control-Allow-Origin: *");
    class Controller{
        public bool $okTitle;
        public bool $okDescription;

        public function checkTitle(){
            $title = $_POST["title"];
            if(strlen($title) > 3){
                $this->okTitle = true;
            }else{
                $this->okTitle = false;
            }
            $this->checkDescription();
        }

        public function checkDescription(){
            $description = $_POST["description"];
            if(strlen($description) > 10){
                $this->okDescription = true;
            }else{
                $this->okDescription = false;
            }
            $this->returnMessage();
        }

        public function returnMessage(){
            if($this->okTitle && $this->okDescription){
                $message = "Title and Description are good!";
            }
            if (!$this->okTitle && $this->okDescription){
                $message = "Title must be more than 3 characters";
            }
            if ($this->okTitle && !$this->okDescription){
                $message = "Description must be more than 10 characters";
            }
            if(!$this->okTitle && !$this->okDescription){
                $message = "Title and Description must be more than 3 & 10 characters respectively";
            }
            echo json_encode($message);
        }
    }
?>