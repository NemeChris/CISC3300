<?php

class Item{
    public function itemData(){
        $game = [
            'Name' => 'Fortnite',
            'Type' => 'Digital' 
         ];
 
     echo json_encode($game);
     exit();
    }
}


?>