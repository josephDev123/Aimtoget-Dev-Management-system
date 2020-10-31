



<?php


//Admin categories section




function add_categories(){

	//INSERTING CATEGORIES INTO CATEGORIES TABLE/admin section/ query

	global $conn;

      if (isset($_POST['add_cat_btn'])) {
           $cat_value = $_POST['add_cat'];

           if (empty($cat_value)) {
               echo "The Add Categories Field is empty";
           }else{

           $sql = "INSERT INTO cart_table (cart_title)VALUES('$cat_value')";
          $result_insert_categories = mysqli_query($conn, $sql);
                            if (!$result_insert_categories) {
             echo "Add to categories failed:".mysqli_error($conn);
           }
        }
     }

 }



function update_categories(){

	   //update categories
global $conn;
  if (isset($_POST['edit_cat_btn'])) {
      $edit_cat_id = $_GET['edit'];

      $edit_cat_value = $_POST['edit_cat_value'];
      $sql = "UPDATE cart_table SET cart_title = '$edit_cat_value' WHERE id = '$edit_cat_id'";
      $result_update = mysqli_query($conn, $sql);
      if (!$result_update) {
         echo "UPDATE FAILED:".mysql_error($conn);
      }
  }

}


function delete_categories(){

	//deleting categories query
global $conn;
  if (isset($_GET['delete'])) {
         $delete_value = $_GET['delete'];
         $sql = "DELETE  FROM cart_table WHERE id = '$delete_value'";
         $result_delete = mysqli_query($conn, $sql);
     if (!$result_delete) {
        echo "delete failed";
     }
    }


}

?>