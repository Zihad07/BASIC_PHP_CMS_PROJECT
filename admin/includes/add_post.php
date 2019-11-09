<?php 

    if(isset($_POST['create_post'])){
       $post_title = htmlspecialchars($_POST['title']);
       $post_author = htmlspecialchars($_POST['author']);
       $post_category_id = htmlspecialchars($_POST['post_category']);
       $post_status = htmlspecialchars($_POST['post_status']);

       $post_image = $_FILES['image']['name'];
       $post_image_temp = $_FILES['image']['tmp_name'];

       $post_tags = htmlspecialchars($_POST['post_tags']);
       $post_content = htmlspecialchars($_POST['post_content']);
       $post_date = date('d-m-y');
    //    $post_comment_count = 4;

    //    print_r($_FILES['image']);

    //    image file move

        move_uploaded_file($post_image_temp,"../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";

       $create_post_query = mysqli_query($connection,$query);

    //    check error of query failed
       confirmQuery($create_post_query);


    }

?>



<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" id="">
    </div>

    <div class="form-group">
        <label for="Post_category">Post Category Id</label>
        
        <select name="post_category" id="post_category" class="form-control">
                <?php 
                
                $query = "SELECT * FROM categories ";
                $select_categories = mysqli_query($connection,$query);

                confirmQuery($select_categories);

                while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<option value=\"{$cat_id}\">{$cat_title}</option>";
                }
            
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="author" id="">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="image" id="">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea name="post_content" class="form-control" id="" cols="30" rows="10"></textarea>
    </div>

    <input class="btn btn-primary" type="submit" name="create_post" value="publist post">
</form>