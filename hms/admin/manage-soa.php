<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
		  {
		          $del = "DELETE FROM soa WHERE id = '".$_GET['id']."'";
                  $ete = mysqli_query($con,$del);
                  $_SESSION['msg']="Data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Manage SOA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link rel="stylesheet" href="assets/js/dataTables.bootstrap.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<style>
    @media print {
        /* Hide every other element */
        body * {
            visibility: hidden;
        }

        /* Then displaying print container elements */
        .print-container, .print-container * {
            visibility: visible;
        }

        /* Adjusting the position to always start from top left */
        .print-container {
            position: absolute;
            left: 0px;
            top: 0px;
        }
    }
</style>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle print-container">Admin | Manage SOA</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Manage SOA</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<p style="color:red;"><?php echo $_SESSION['msg'];?>
							<?php echo $_SESSION['msg']="";?></p>	
									<table class="table table-hover print-container" id="sample-table-1">
										<thead>
											<tr>
												
												<th>#</th>
												<th>Item/Airline Code<br />/Reloc/Ferry Ticket</th>
												<th>Cost</th>
												<th>SC</th>
												<th>Total</th>
												<th>OR</th>
												<th>Swiped</th>
												<th>SOA Account</th>
												<th>Date</th>
											</tr>
										</thead>
										<tbody>
<?php
$sql= "SELECT * FROM soa";
$con = mysqli_query($con,$sql);
$cnt=1;
while($row = mysqli_fetch_array($con))
{
?>

											<tr>
								
												<td><b><?php echo $row['soa_number'];?></b></td>
												<td><b><?php echo $row['soa_items'];?></b></td>
												<td><?php echo $row['soa_cost'];?></td>
												<td><?php echo $row['soa_sc'];?></td>
												<td><?php echo $row['soa_total'];?></td>
												<td><?php echo $row['soa_or'];?></td>
												<td><?php echo $row['soa_swiped'];?></td>
												<td><?php echo $row['soa_account'];?></td>
												<td><?php echo $row['date'];?></td>




												
												<!-- <div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td> -->
											</tr>
											
											<?php 
												$cnt=$cnt+1;
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
										<div class="form-group">
										</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
										</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
										</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
											<button onclick = "window.print ();" class="btn btn-primary btn-md btn-success">PRINT</button>
										</div>
								</div>
						</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<!-- <?php include('include/footer.php');?> -->
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script src="assets/js/bootstrap.js"></script>
		<script src="assets/js/dataTables.bootstrap.js"></script>
		<script src="assets/js/jquery.dataTables.js"></script>
		<script>
		$(".table").DataTable();
		</script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
