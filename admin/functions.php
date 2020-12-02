
<?php
//select number(count) of post publish function

function selectAllPublishPost($post_table,  $post_status){
    global $conn;
    $sql = "SELECT * FROM $post_table WHERE $post_status ='Publish'";
    $check_query_against_database = mysqli_query($conn, $sql);
    if ($check_query_against_database) {
        $num_of_row_in_post = mysqli_num_rows($check_query_against_database);
        return $num_of_row_in_post ;
    }
}

//select number(count) of draft publish function
function selectAlldraftPost($post_table, $post_status){
    global $conn;
    $sql = "SELECT * FROM $post_table WHERE $post_status ='Draft'";
    $check_query_against_database = mysqli_query($conn, $sql);
    if ($check_query_against_database) {
       return  $num_of_draft_post = mysqli_num_rows($check_query_against_database);
        
    }
}


//select number(count) of comment in comment table function
function numOfComment($comments_table){
    global $conn;
    $sql = "SELECT * FROM $comments_table";
    $check_query_against_database = mysqli_query($conn, $sql);
    if ($check_query_against_database) {
        return $num_of_row_in_comment = mysqli_num_rows($check_query_against_database);
    }
}


//select number(count) of users in users table function
function numOfUser($users_table){
    global $conn;
    $sql = "SELECT * FROM $users_table";
	$check_query_against_database = mysqli_query($conn, $sql);
	if ($check_query_against_database) {
	return $num_of_row_in_userstable = mysqli_num_rows($check_query_against_database);
	}
}


function numOfRowCategory($cart_table){
    global $conn;
    $sql = "SELECT * FROM $cart_table";
	$check_query_against_database = mysqli_query($conn, $sql);
	if ($check_query_against_database) {
	return $num_of_row_in_category = mysqli_num_rows($check_query_against_database);
	}
}



// code that allow only users who are admin to see other user in the users table
function isAdmin($username){
    global $conn;
    
    $sql = "SELECT users_role FROM users_table WHERE users_username = '$username'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    $admin = $data['users_role'];

    if($admin =='admin'){
        return true;
    }else{
        return header('Location: ../admin');
    }

}






?>