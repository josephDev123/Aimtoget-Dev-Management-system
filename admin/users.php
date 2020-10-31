

<!-- admin header -->


<?php include 'includes/admin_header.php'; ?>

    <div id="wrapper">

 <!-- admin navigation -->

<?php include 'includes/admin_navigation.php'; ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row -->

                <?php

                if (isset($_GET['source'])) {
                   $source = $_GET['source'];
                }else{
                   $source ="";
                }


                switch ($source) {
                    case 'add_user':
                      include 'includes/add_users.php';
                        break;
                    
                    case 'edit_users':
                     include 'includes/edit_users.php';
                        break;


                    default:
                       include 'includes/view_all_users.php';
                        break;
                }

                ?>






            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>