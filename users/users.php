<?php 
function getUsers(){

   return json_decode(file_get_contents(__DIR__.'/user.json'),true);
   
}

function getUserById($id){
    $users=json_decode(file_get_contents(__DIR__.'/user.json'),true);
    foreach($users as $user){
        if($user['id']==$id){
            return $user;
        }
    }
    return null;
}
function CreateUser($data){
    $users=getUsers();

    $data['id']=rand(1000000,2000000);
    $users[]=$data;
    putjson($users);
    return $data;

}
function UpdateUser($data,$id){
    $updateuser=[];
    $users=getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i]  = $updateuser = array_merge($user, $data);
        }
    }
    // echo '<pre>';print_r($users);echo '</pre>';
    putjson($users);
    
    return $updateuser;
}

function DeleteUser($id){
    $users=getUsers();

    foreach($users as $i =>$user){
        if($user['id']==$id){
            array_splice($users,$i,1);
        }
    }
    putjson($users);
}

function UploadImage($file,$user){
    if(isset($_FILES['picture']) && $_FILES['picture']['name']){
    if(!is_dir(__DIR__."/images")){
        mkdir(__DIR__."/images");
    }

    $file_name=$file['name'];
    $dotpos=strpos($file_name, '.');
    $exten=substr($file_name,$dotpos+1);
    
    $q=$user['id'].'.'.$exten;
    
    move_uploaded_file($file['tmp_name'],__DIR__."/images/$q");

    $user['extension']=$exten;

    $us=UpdateUser($user,$user['id']);
    }
}

function putjson($users){
    file_put_contents(__DIR__.'/user.json',json_encode($users,JSON_PRETTY_PRINT));
}

function validateUser($user, &$errors)
{
    $isValid = true;
    // Start of validation
    if (!$user['name']) {
        $isValid = false;
        $errors['name'] = 'Name is mandatory';
    }
    if (!$user['username'] || strlen($user['username']) < 6 || strlen($user['username']) > 16) {
        $isValid = false;
        $errors['username'] = 'Username is required and it must be more than 6 and less then 16 character';
    }
    if ($user['email'] && !filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
        $isValid = false;
        $errors['email'] = 'This must be a valid email address';
    }

    if (strlen($user['phone'])<=10) {
        $isValid = false;
        $errors['phone'] = 'This must be a valid phone number';
    }
    // End Of validation

    return $isValid;
}

?>