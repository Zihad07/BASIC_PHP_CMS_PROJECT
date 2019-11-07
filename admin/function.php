<?php 


    function confirmQuery($result){
        global $connection;
        if(!$result){
            die("Query Failed .".mysqli_error($connection));
        }
    }

    function insert_category(){
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = htmlspecialchars($_POST['cat_title']) ?? '';

            if($cat_title == "" || empty($cat_title)){
                echo "This is filed should not be empty";
            }else{
                $query = "INSERT INTO categories(cat_title) ";
                $query .= "VALUES('{$cat_title}') ";

                $create_category_query = mysqli_query($connection,$query);

                if(!$create_category_query){
                    die("Query Failed".mysqli_error($connection));
                }

                //  Redirect page
                //  header("Location: categories.php");
            }
        }

    }

    function findAllCategories(){
        global $connection;

        
        // Find all Categories QUERY
         $query = "SELECT * FROM categories";
         $select_categories = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($select_categories)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>{$cat_id}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td><a href=\"categories.php?delete={$cat_id}\" class='btn-sm btn-danger'>Delete</a></td>";
            echo "<td><a href=\"categories.php?edit={$cat_id}\" class='btn-sm btn-primary'>Edit</a></td>";
            echo "</tr>";

        }
    

    }

    function deleteCategories(){
        global $connection;
        if(isset($_GET['delete'])){
            $the_cat_id = htmlspecialchars($_GET['delete']);

            $query = "DELETE FROM categories WHERE cat_id ='{$the_cat_id}' LIMIT 1";

            $delete_query = mysqli_query($connection,$query);
            header("Location: categories.php");

        }
    }

