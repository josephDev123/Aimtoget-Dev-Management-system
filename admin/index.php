 


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
                            <small><?php echo strtoupper($_SESSION['username']); ?> </small>
                        </h1>
                      
                    </div>
                </div>
                <!-- /.row -->

				<?php
				//number of publish post
				$row_num_of__post = selectAllPublishPost('post_table',  'post_status');
				?>   

				
				<?php
				$num_of_draft_post = selectAlldraftPost('post_table', 'post_status');
				?>         
					<div class="row">
					    <div class="col-lg-3 col-md-6">
					        <div class="panel panel-primary">
					            <div class="panel-heading">
					                <div class="row">
					                    <div class="col-xs-3">
					                        <i class="fa fa-file-text fa-5x"></i>
					                    </div>
					                    <div class="col-xs-9 text-right">
					                  <div class='huge'><?php  echo $row_num_of__post; ?></div>
					                        <div>Posts</div>
					                    </div>
					                </div>
					            </div>
					            <a href="post.php">
					                <div class="panel-footer">
					                    <span class="pull-left">View Details</span>
					                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					                    <div class="clearfix"></div>
					                </div>
					            </a>
					        </div>
					    </div>

			 <?php
			 //comment count from comment table
					$num_of_row_in_comment = numOfComment('comments_table');
				?>
					    <div class="col-lg-3 col-md-6">
					        <div class="panel panel-green">
					            <div class="panel-heading">
					                <div class="row">
					                    <div class="col-xs-3">
					                        <i class="fa fa-comments fa-5x"></i>
					                    </div>
					                    <div class="col-xs-9 text-right">
					                     <div class='huge'><?php  echo $num_of_row_in_comment; ?></div>
					                      <div>Comments</div>
					                    </div>
					                </div>
					            </div>
					            <a href="comments.php">
					                <div class="panel-footer">
					                    <span class="pull-left">View Details</span>
					                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					                    <div class="clearfix"></div>
					                </div>
					            </a>
					        </div>
					    </div>


			 <?php
					$num_of_row_in_userstable = numOfUser('users_table');
				?>


					    <div class="col-lg-3 col-md-6">
					        <div class="panel panel-yellow">
					            <div class="panel-heading">
					                <div class="row">
					                    <div class="col-xs-3">
					                        <i class="fa fa-user fa-5x"></i>
					                    </div>
					                    <div class="col-xs-9 text-right">
					                    <div class='huge'><?php  echo $num_of_row_in_userstable ; ?></div>
					                        <div> Users</div>
					                    </div>
					                </div>
					            </div>
					            <a href="users.php">
					                <div class="panel-footer">
					                    <span class="pull-left">View Details</span>
					                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					                    <div class="clearfix"></div>
					                </div>
					            </a>
					        </div>
					    </div>



					    <?php
					$num_of_row_in_category = numOfRowCategory('cart_table');
				?>
					    <div class="col-lg-3 col-md-6">
					        <div class="panel panel-red">
					            <div class="panel-heading">
					                <div class="row">
					                    <div class="col-xs-3">
					                        <i class="fa fa-list fa-5x"></i>
					                    </div>
					                    <div class="col-xs-9 text-right">
					                        <div class='huge'><?php  echo $num_of_row_in_category ; ?></div>
					                         <div>Categories</div>
					                    </div>
					                </div>
					            </div>
					            <a href="admin_categories.php">
					                <div class="panel-footer">
					                    <span class="pull-left">View Details</span>
					                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
					                    <div class="clearfix"></div>
					                </div>
					            </a>
					        </div>
					    </div>
					</div>
					                <!-- /.row -->

					

 			<div class="row">
				  <script type="text/javascript">
				      google.charts.load('current', {'packages':['bar']});
				      google.charts.setOnLoadCallback(drawChart);

				      function drawChart() {
				        var data = google.visualization.arrayToDataTable([

				        	['Posts', 'count'],

				     <?php

				        $element =['Active post', 'Draft post', 'Number of Comment', 'Number of users', 'Number of Categories'];
				        $element_values =[$row_num_of__post, $num_of_draft_post, $num_of_row_in_comment, $num_of_row_in_userstable, $num_of_row_in_category];
				        for ($i = 0; $i<count($element); $i++) {
				        	$element[$i]; 

				        	?>

				        	 ["<?php echo $element[$i]; ?>", "<?php echo $element_values[$i]; ?>"],

						<?php

				        	
				        }

				    ?>
						
				    		 // ['Year', 'Sales'],
				       //      ['2014', 1000]
				       //      ['Year', 'Sales', 'Expenses', 'Profit'],
				            // ['2014', 1000, 400, 200]
				         

				          // ['2015', 1170, 460, 250],
				          // ['2016', 660, 1120, 300],
				          // ['2017', 1030, 540, 350]


				        ]);

				        	var options = {
				        //   chart: {
				        //     title: 'Company Performance',
				        //     subtitle: 'Sales, Expenses, and Profit: 2014-2017',
				        //   }
				        };

				        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

				        chart.draw(data, google.charts.Bar.convertOptions(options));
				      }
				    </script>

	            	<div id="columnchart_material" style="width: auto; height: 500px;"></div>
            </div>
					            
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
