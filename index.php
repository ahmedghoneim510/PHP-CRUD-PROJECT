<?php 
    require '/xampp/htdocs/CRUD/users/users.php';
    $users=getUsers(); 

    include 'header.php';
?>



<div class="container">
    <p>
        <a style="margin-top:10px ;" class="btn btn-sm btn-success" href="create.php">Create New User</a>
    </p>
<table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>UserName</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <?php if (isset($user['extension'])):
                            
                            $q=$user['id'].'.'.$user['extension']
                            ?>

                            <img style="width: 60px ; height:60px;" src="<?php echo "users/images/$q" ?>" alt="">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user["name"] ?></td>
                    <td><?php echo $user["username"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["phone"] ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-primary">View</a>
                        <a href="update.php?id=<?php echo $user['id']?>" class="btn btn-sm btn-info">Update</a>
                        <form style="display: inline-block;" method="POST" action="delete.php">
                        <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
                        <button  class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>

            <?php endforeach;?>
        </tbody>
    </table>
</div>
    <?php include 'footer.php';?>