<?php

require '/xampp/htdocs/CRUD/users/users.php';
include 'header.php';


if(!isset($_POST['id'])){
    echo 'Not Found';
    exit();
}
$UserId=$_POST['id'];

DeleteUser($UserId);


header("location: index.php");
// $user=getUserById($UserId);

// if(!isset($user)){
//     include 'not_found.php';
//     exit();
// }
    
    ?>