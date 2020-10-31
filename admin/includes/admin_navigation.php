


<?php
$session = session_id();
$time = time();
$time_set = 30;
$time_out = $time - $time_set;

$sql = "SELECT * FROM online_users_table WHERE session = '$session'";
$check_online_against_db = mysqli_query($conn, $sql);
$num_of_online_users = mysqli_num_rows ($check_online_against_db);
// echo $num_of_online_users;
if ($num_of_online_users == NULL) {
    $sql ="INSERT INTO online_users_table(online_time, session) VALUES('$time', '$session')";
    $check_insert_into_table_against_db = mysqli_query($conn, $sql);

}else {
    $sql = "UPDATE online_users_table SET online_time = $time WHERE session = '$session'";
    $check_update_online_users_on_db =  mysqli_query($conn, $sql);
}

$sql = "SELECT * FROM online_users_table WHERE online_time > '$time_out'";
$check_online_query_on_db = mysqli_query($conn, $sql);
$num_of_online_user = mysqli_num_rows ($check_online_query_on_db);
// echo $num_of_online_user;

?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">`
            <li><a href="index.php">Users Online: <?php echo $num_of_online_user ?></a></li>
                <li><a href="../index.php">HOME</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">
                    </i> 
                    <?php 
                    if(isset($_SESSION['users_role'])){
                            echo $_SESSION['username'];
                    } 
                    ?> 
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="./profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
<!-- 
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#files"><i class="fa fa-fw fa-arrows-v"></i> Files<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="files" class="collapse">
                            <li>
                                <a href="file.php">View All Uploaded Files</a>
                            </li>
                            <li>
                                <a href="file.php?source=add_post">Upload/Add Files</a>
                            </li>
                        </ul>
                    </li> -->

                      <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#post"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="post" class="collapse">
                            <li>
                                <a href="post.php">View All posts</a>
                            </li>
                            <li>
                                <a href="add_post.php">Add posts</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="admin_categories.php"><i class="fa fa-fw fa-wrench"></i> Categories</a>
                    </li>

                    <li class="">
                        <a href="comments.php"><i class="fa fa-fw fa-file"></i> Comment</a>
                    </li>
                
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i>Users<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="users.php">view all users</a>
                            </li>
                            <li>
                                <a href="users.php?source=add_user">add users</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="profile.php"><i class="fa fa-fw fa-dashboard"></i> Profile</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>