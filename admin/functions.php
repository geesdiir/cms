<?php

function insert_category(){
	global $connection;
	 if(isset($_POST['submit'])){
                     $cat_title = $_POST['cat_title'];
                     if($cat_title == "" || empty($cat_title)){
                     echo "These Feild Should not be an empty";
                             }
                         else{
                      $query = "INSERT INTO categories(cat_title) ";
                       $query .= "values('{$cat_title}') ";
                        $create_category = mysqli_query($connection, $query);
                            if(!$create_category){
                                 die("query has been feilded" . mysqli_error($connection));
                                    }


                                }
                            }


}

function update_category(){
	global $connection;

	if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];

                            $query  = "SELECT *FROM categories WHERE cat_id = {$cat_id} ";
                            $select_categories_id = mysqli_query($connection, $query);

                           while($row = mysqli_fetch_assoc($select_categories_id)){
                           $cat_id =   $row['cat_id'];
                           $cat_title =   $row['cat_title'];

                           ?>
                           <input value = "<?php if(isset($cat_title)){ echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">

                           <?php }} ?>

                           <?php
                           // update functionality
                            if(isset($_POST['update_category'])){ 
                             $the_cat_title = $_POST['cat_title'];
                            $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";
                            $update_query = mysqli_query($connection, $query);
                            if(!$update_query){
                                die("query has been failded". mysqli_error($connection));
                            }
                        }
}

///// show category
function show_category(){
	global $connection;
	  $query  = "SELECT *FROM categories";
                  $select_categories = mysqli_query($connection, $query);

                 while($row = mysqli_fetch_assoc($select_categories)){
                    $cat_id =   $row['cat_id'];
                  $cat_title =   $row['cat_title'];
                  echo "<tr>";
                  echo "<td>{$cat_id}</td>";
                  echo "<td>{$cat_title}</td>";
                  echo "<td><a class = 'btn btn-danger'  href = 'admin_categories.php?delete={$cat_id}'>Delete</a></td>";
                   echo "<td><a class = 'btn btn-primary'  href = 'admin_categories.php?edit={$cat_id}'>Update</a></td>";
                  echo "</tr>";

                 }

}
// delete category
function delete_category(){
	global $connection;
	 if(isset($_GET['delete'])){
                $the_cat_id = $_GET['delete'];
                $query = "DELETE FROM categories where cat_id = {$the_cat_id} ";
                $delete_query = mysqli_query($connection, $query);
                 header("location: admin_categories.php");
                            }
}



?>