<?php
 include 'header.php';
 require '/xampp/htdocs/CRUD/users/users.php';

 $user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
];

$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => "",
];
$isValid = true;
    if($_SERVER['REQUEST_METHOD']==='POST'){

        $user = array_merge($user, $_POST);

        $isValid = validateUser($user, $errors);
    
        if ($isValid) {
            $user = createUser($_POST);
    
            uploadImage($_FILES['picture'], $user);
    
            header("Location: index.php");
        }
    
    }
?>
<?php include 'form.php'; ?>
 <?php include 'footer.php'; ?>