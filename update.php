<?php
require '/xampp/htdocs/CRUD/users/users.php';
include 'header.php';


if(!isset($_GET['id'])){
    echo 'Not Found';
    exit();
}
$UserId=$_GET['id'];

$user=getUserById($UserId);

if(!isset($user)){
    include 'not_found.php';
    exit();
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $User=UpdateUser($_POST,$UserId);
   
   

        UploadImage($_FILES['picture'],$User);
        // $User=UpdateUser($_POST,$UserId);
   header("location: index.php");
}

?>

    <?php include 'form.php';?>
