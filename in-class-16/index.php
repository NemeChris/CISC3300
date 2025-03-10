<?php
    try{
        $name = "";
        if(empty($name)){
            throw("Custom Exception Thrown");
        }
    }
    catch(Error $myError){
        echo "Custom Exception Caught";
    }
?>