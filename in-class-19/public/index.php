<?php
require_once "../app/models/Model.php";
require_once "../app/models/User.php";
require_once "../app/controllers/UserController.php";

//set our env variables, remember con
$env = parse_ini_file('../.env');
define('DBNAME', $env['DBNAME']);
define('DBHOST', $env['DBHOST']);
define('DBUSER', $env['DBUSER']);
define('DBPASS', $env['DBPASS']);


use app\controllers\UserController;

//get uri without query strings
$uri = strtok($_SERVER["REQUEST_URI"], '?');

//get uri pieces
$uriArray = explode("/", $uri);
//0 = ""
//1 = users
//2 = 1


//get all or a single user
// if ($uriArray[1] === 'api' && $uriArray[2] === 'users' && $_SERVER['REQUEST_METHOD'] === 'GET') {
//     //only id
//     $id = isset($uriArray[3]) ? intval($uriArray[3]) : null;
//     $userController = new UserController();

//     if ($id) {
//         $userController->getUserByID($id);
//     } else {
//         $userController->getUsers();
//     }
// }


//views

if ($uriArray[1] === 'posts') {
    $userController = new UserController();
    $userController->getUsers();
}
exit();

?>