<?php 

    if(isset($_GET['edit_user'])){
        $the_user_id = $_GET['edit_user'];
        
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_user_query = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_user_query)){
           $user_id = $row['user_id'];
           $user_name = $row['username'];
           $user_password = $row['user_password'];
           $user_firstname = $row['user_firstname'];
           $user_lastname = $row['user_lastname'];
           $user_email = $row['user_email'];
           $user_image = $row['user_image'];
           $user_role = $row['user_role'];
    }
}
    if(isset($_POST['edit_user'])){
    
        $user_id = $_GET['edit_user'];
        $user_name = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        // $user_image = $_POST['user_image'];
        $user_role = $_POST['user_role'];

    //    $post_image = $_FILES['image']['name'];
    //    $post_image_temp = $_FILES['image']['tmp_name'];

       
      
    //    $post_comment_count = 4;

    //    print_r($_FILES['image']);

    //    image file move

        // move_uploaded_file($post_image_temp,"../images/$post_image");

        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$user_name}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE user_id = {$user_id} ";
        // echo $query;
        // die();

       $edit_user_query = mysqli_query($connection,$query);

    //    check error of query failed
       confirmQuery($edit_user_query);

       header("Location: users.php");


    }

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Fistname</label>
        <input type="text" class="form-control" name="user_firstname" id="" value="<?php echo $user_firstname;?>">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="" value="<?php echo $user_lastname;?>">
    </div>


    <div class="form-group">
        <label for="user_role">User Role</label>
        
        <select name="user_role" id="user_role" class="form-control">
               <option value="admin" <?php if(isset($user_role)&& $user_role=="admin") {echo "selected";}?>>Admin</option>
               <option value="subcriber"<?php if(isset($user_role)&& $user_role=="subscriber") {echo "selected";}?>>Subscriber</option>
        </select>
    </div>

<!-- 
    <div class="form-group">
        <label for="post_image">User</label>
        <input type="file" class="form-control" name="image" id="">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" id="" value="<?php echo $user_name;?>">
    </div>
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email" id="" value="<?php echo $user_email;?>">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password" id="" value="<?php echo $user_password;?>">
    </div>

   

    <input class="btn btn-primary" type="submit" name="edit_user" value="Edit User">
</form>