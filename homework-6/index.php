<?php
$myArray = [
    "name" => "Lebron",
    "age" => 40,
    "team" => "Lakers"
];

foreach($myArray as $key => $value){
    echo "$key : $value\n";
}


//Number 7

function myCalc(int $firstNum, int $secondNum = 1) : int {
    return $firstNum * $secondNum;
}

$result = myCalc(8, 3);

echo "\n |result from #7 function: $result";

?>