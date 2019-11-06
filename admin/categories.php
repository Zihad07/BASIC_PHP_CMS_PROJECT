<?php include "includes/admin_header.php";?>
<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small>Author</small>
                    </h1>

                    <div class="col-xs-6">

                        <?php insert_category();?>

                        <!-- Add Categories -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat-title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title">
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>
                        </form>
                        <!-- Edit Categories -->
                       <?php 
                       
                    //    Upadate categoies and include upadte category
                        if(isset($_GET['edit'])){
                            $cat_id = htmlspecialchars($_GET['edit']);
                            include "includes/update_categories.php";
                        }     
                       
                       ?>
                    </div><!-- Add Category Form-->

                    <div class="col-xs-6">
                        <?php 
                       
                        ?>
                        <table class="table border table-bordered table-hover text-center">
                            <thead>
                                <tr class="text-center">
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- Finde all categories -->
                                <?php findAllCategories();?>

                                <?php 
                                    // delete categories
                                   deleteCategories();
                                ?>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php";?>
