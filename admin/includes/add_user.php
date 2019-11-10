<?php 

    if(isset($_POST['create_user'])){
    
     $user_firstname = htmlspecialchars($_POST['user_firstname']);
    
       $user_lastname = htmlspecialchars($_POST['user_lastname']);
       $user_role = htmlspecialchars($_POST['user_role']);

    //    $post_image = $_FILES['image']['name'];
    //    $post_image_temp = $_FILES['image']['tmp_name'];

       $user_name = htmlspecialchars($_POST['username']);
       $user_email = htmlspecialchars($_POST['user_email']);
       $user_password = htmlspecialchars($_POST['user_password']);
      
    //    $post_comment_count = 4;

    //    print_r($_FILES['image']);

    //    image file move

        // move_uploaded_file($post_image_temp,"../images/$post_image");

        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_role) ";

        $query .= "VALUES('{$user_name}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}') ";
        // echo $query;
        // die();

       $create_user_query = mysqli_query($connection,$query);

    //    check error of query failed
       confirmQuery($create_user_query);


    }

?>



<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
        <label for="title">Fistname</label>
        <input type="text" class="form-control" name="user_firstname" id="">
    </div>

    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" id="">
    </div>


    <div class="form-group">
        <label for="user_role">User Role</label>
        
        <select name="user_role" id="user_role" class="form-control">
               <option value="admin">Admin</option>
               <option value="subcriber" selected >Subscriber</option>
        </select>
    </div>

<!-- 
    <div class="form-group">
        <label for="post_image">User</label>
        <input type="file" class="form-control" name="image" id="">
    </div> -->

    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username" id="">
    </div>
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email" id="">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="password" class="form-control" name="user_password" id="">
    </div>

   

    <input class="btn btn-primary" type="submit" name="create_user" value="Add User">
</form>