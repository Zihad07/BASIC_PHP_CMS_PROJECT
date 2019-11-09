<?php 
    
    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = '{$the_comment_id}' ";
        echo $query;
        $delete_query = mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header('Location: comments.php');
    }

    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapprove' WHERE comment_id = $the_comment_id LIMIT 1";
        echo $query;
        $unapprove_query = mysqli_query($connection,$query);
        confirmQuery($unapprove_query);
        header('Location: comments.php');
    }

    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approve' WHERE comment_id = $the_comment_id LIMIT 1";
        echo $query;
        echo "<br>";
        $delete_query = mysqli_query($connection,$query);
        confirmQuery($delete_query);
        header('Location: comments.php');
    }

?>


<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapporve</th>
            <th>Delete</th>
            <!-- <th>Edit</th> -->
        </tr>
    </thead>

    <tbody style="font-size:13px;">
        <?php 
                                $query = "SELECT * FROM comments ";
                                $select_comments = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_assoc($select_comments)){
                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_email = $row['comment_email'];
                                    $comment_content = $row['comment_content'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                
                            ?>

        <tr>
            <td><?php echo $comment_id;?></td>
            <td><?php echo $comment_author;?></td>
            <td><?php echo $comment_content;?></td>
            <td><?php echo $comment_email;?></td>
            <?php 
                // $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
                // $select_categories_id = mysqli_query($connection,$query);

                // while($row = mysqli_fetch_assoc($select_categories_id)){
                //     $cat_id = $row['cat_id'];
                //     $cat_title = $row['cat_title'];
                //     echo "<td>{$cat_title}</td>";
                // }
            
            ?>
           
            <td><?php echo $comment_status;?></td>

            <?php 
                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
                $select_post_id_query = mysqli_query($connection,$query);

                while($data = mysqli_fetch_assoc($select_post_id_query)){
                    $post_id = $data['post_id'];
                    $post_title = $data['post_title'];
                    echo "<td><a href=\"../post.php?p_id=$post_id\">$post_title</a></td>";
                }
            
            ?>
            


            <td><?php echo $comment_date;?></td>
            <td><a class="btn btn-primary btn-sm" href="comments.php?approve=<?php echo $comment_id;?>">Approve</a></td>
            <td><a class="btn btn-danger btn-sm" href="comments.php?unapprove=<?php
            echo $comment_id;?>">Unapporve</a></td>
            <td><a class="btn btn-danger btn-sm" href="comments.php?delete=<?php echo $comment_id;?>">Delete</a></td>
            <!-- <td><a class="btn btn-primary btn-sm" href="posts.php?source=edit_post&p_id=<?php ;?>">Edit</a></td> -->
            
        </tr>
        <?php }?>
    </tbody>
</table>

<h1>Comments</h1>
