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
/*echo "<pre>";
print_r($user);
echo "</pre>";*/

?>



<div class="container">
<div class="card">
    <div class="card-header">
        <h3>View User : <b><?php echo $user["name"]?></b></h3>
    </div>
    <div class="card-body">
    <a  style="display: inline-block;" class="btn btn-primary" href="index.php"><h4>Back Home</h4></a><br />
    <a style="margin-top:10px;" href="update.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-info">Update</a>
    <form style="display: inline-block; " method="POST" action="delete.php">
    <input type="hidden"  name="id" value="<?php echo $user['id'] ?>">
    <button style="margin-top:10px;" class="btn btn-sm btn-danger">Delete</button>
    </form>
    </div>
    <table class="table">
    <tbody>
        <tr>
            <th>Name</th>
            <td><?php echo $user["name"] ?></td>
        </tr>

        <tr>
            <th>UserName</th>
            <td><?php echo $user["username"] ?></td>
        </tr>

        <tr>
            <th>Email</th>
            <td><?php echo $user["email"] ?></td>
        </tr>

        <tr>
            <th>Phone</th>
            <td><?php echo $user["phone"] ?></td>
        </tr>
    </tbody>
</table>

</div>
</div>

<?php include 'footer.php';?>