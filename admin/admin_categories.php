<?php include "../includes/db.php"; ?>
<?php include "include/admin_header.php"; ?>


    <div id="wrapper">
  
        <!-- Navigation -->
        <?php include "include/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome The Admin Page
                            <small>Author</small>
                            </h1>
                            <div class="col-xs-6">
                            <!-- Function Insert Category -->

                            <?php insert_category(); ?>

                                <form action="" method="post">
                                  <div class="form-group">
                                     <label for="cat_title">Add Category</label>
                                      <input type="text" class="form-control" name="cat_title">
                                  </div>
                                  <div class="form-group">
                                      <input type="submit" name="submit" value="Add Category" class="btn btn-info">
                                  </div>     
                                </form>

                                <?php
                                if(isset($_GET['edit'])){
                                    $cat_id = $_GET['edit'];
                                    include "include/admin_update_category.php";
                                }
                                ?>
                                
                            </div>
                            <div class="col-xs-6">

                            
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Category Title</th>
                                            <th>Action</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                  
                  <!-- Finding Category /Showing caregory -->
                  <?php  show_category();
                
                            ?>
                            
                            <!-- // Deleting Category -->
                           <?php delete_category(); ?>
 
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


   <?php include "include/admin_footer.php"; ?>
