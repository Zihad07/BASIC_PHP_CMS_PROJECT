<?php 
    
    if(isset($_GET['delete'])){
        $the_user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = '{$the_user_id}' ";
        echo $query;
        $delete_query = mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header('Location: users.php');
    }

    if(isset($_GET['change_to_admin'])){
        $the_user_id = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id LIMIT 1";
        // echo $query;
        $change_to_admin_query = mysqli_query($connection,$query);
        confirmQuery($change_to_admin_query);
        header('Location: users.php');
    }

    if(isset($_GET['change_to_subscirber'])){
        $the_user_id = $_GET['change_to_subscirber'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id LIMIT 1";
        // echo $query;
        // echo "<br>";
        $change_to_subscriber_query = mysqli_query($connection,$query);
        confirmQuery($change_to_subscriber_query);
        header('Location: users.php');
    }

?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Role</th>
            
            <th>Delete</th>
            <!-- <th>Edit</th> -->
        </tr>
    </thead>

    <tbody style="font-size:13px;">
        <?php 
                                $query = "SELECT * FROM users ";
                                $select_users = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_users)){
                                   $user_id = $row['user_id'];
                                   $user_name = $row['username'];
                                   $user_password = $row['user_password'];
                                   $user_firstname = $row['user_firstname'];
                                   $user_lastname = $row['user_lastname'];
                                   $user_email = $row['user_email'];
                                   $user_image = $row['user_image'];
                                   $user_role = $row['user_role'];
                                
                            ?>

        <tr>
            <td><?php echo $user_id;?></td>
            <td><?php echo $user_name;?></td>
            <td><?php echo $user_firstname;?></td>
            <td><?php echo $user_lastname;?></td>
            <td><?php echo $user_email;?></td>
            <td><?php echo $user_role;?></td>
            <?php 
                // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                // $select_categories_id = mysqli_query($connection,$query);

                // while($row = mysqli_fetch_assoc($select_categories_id)){
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                //     echo "<td>{$cat_title}</td>";
                // }
            
            ?>
           
            

            <?php 
                // $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                // $select_post_id_query = mysqli_query($connection,$query);

                // while($data = mysqli_fetch_assoc($select_post_id_query)){
                //     $post_id = $data['post_id'];
                //     $post_title = $data['post_title'];
                //     echo "<td><a href=\"../post.php?p_id=$post_id\">$post_title</a></td>";
                // }
            
            ?>
            

            <td><a class="btn btn-primary btn-sm" href="users.php?change_to_admin=<?php echo $user_id;?>">Admin</a></td>
            <td><a class="btn btn-danger btn-sm" href="users.php?change_to_subscirber=<?php echo $user_id;?>">Subscriber</a></td>
            <td><a class="btn btn-primary btn-sm" href="users.php?source=edit_user&edit_user=<?php echo $user_id;?>">Edit</a></td>
            <td><a class="btn btn-danger btn-sm" href="users.php?delete=<?php echo $user_id;?>">Delete</a></td>
            <!-- <td><a class="btn btn-primary btn-sm" href="posts.php?source=edit_post&p_id=<?php ;?>">Edit</a></td> -->
            
        </tr>
        <?php }?>
    </tbody>
</table>

<h1>ALL USER</h1>
