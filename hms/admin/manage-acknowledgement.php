<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
// $dod=intval($_GET['id']);
// if(isset($_POST['verify']))
// {
// 	$status = 1;

// $sql2 = "UPDATE acknowledgements SET acknowledgements.status1='$status' WHERE id='$dod'";
// $con2 = mysqli_query($con,$sql2);
// $_SESSION['msg'] = "VERIFIED";
// }
// if(isset($_GET['del']))
// 		  {
// 		          $del = "DELETE FROM acknowledgements WHERE id = '".$_GET['id']."'";
//                   $ete = mysqli_query($con,$del);
//                   $_SESSION['msg']="Data deleted !!";
// 		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Acknowledgement History</title>
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
							<div class="row print-container">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Acknowledgements History</h1>
								</div>
							</div>
							<div class="row">
									<ol class="breadcrumb">
										<li>
											<span>Admin</span>
										</li>
										<li class="active">
											<span>Acknowledgements History</span>
										</li>
									</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid bg-white">
							<div class="row ">
								<div class="col-md-12">
									<!-- <h5 class="over-title margin-bottom-15">Manage <span>Staff</span></h5> -->
									<h5 style="color:green; font-weight:bold; padding-top: 5px;"><?php echo $_SESSION['msg'];?>
								<?php echo $_SESSION['msg']="" ;?></h5>	
									<table class="table table-hover print-container" id="sample-table-1" >
										<thead>
											<tr>
												<th>ACK #</th>
												<th>Date</th>
												<th>To</th>
												<th>From</th>
												<th>Item</th>
												<th>Cost</th>
												<th>Collected</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
<?php
$sql= "SELECT * FROM acknowledgements";
$con = mysqli_query($con,$sql);
$cnt=1;
while($row=mysqli_fetch_array($con))
{
?>

											<tr>
								
												<td><b><?php echo $row['id'];?></b></td>
												<td><b><?php echo $row['date'];?></b></td>
												<td><?php echo $row['receiver'];?></td>
												<td><?php echo $row['issuer'];?></td>
												<td><?php echo $row['items'];?></td>
												<td><?php echo $row['cost'];?></td>
												<td><?php echo $row['collected'];?></td>
												<td>
												<?php if ($row['status1']!=="6276")
                                            {
                                                echo ("Not Verified");
                                            
                                            } elseif ($row['status1']=="6276") {

                                                echo ("Verified");
                                            }
                                            
                                            ?>
												</td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							
	<a href="edit-acknowledgement.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil hidden-print"></i></a>
	<a href="verify-acknowledgement.php?id=<?php echo $row['id'];?>" class="btn btn-info btn-sm" data-target="#myModal">Verify</a>
												</td>
											</tr>
												<?php $cnt=$cnt+1;}?>
											
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
								<div class="col-md-5">
										<div class="form-group">
											<button onclick = "window.print();" class="btn btn-primary btn-md btn-success">PRINT</button>
										</div>
								</div>
						</div>

<!--VERIFY FUNCTION-->
<!--END FUNCTION-->
  <!-- Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verification Code</h4>
		  <?php echo $_SESSION['msg']="" ;?></p>
        </div>
        <div class="modal-body">
          <p>Enter Verification Code</p>
		  	<input type="password" name="code" class="input-sm" style="width:100%;">
        </div>
        <div class="modal-footer">
          <button type="submit" name="verify" class="btn btn-success" data-dismiss="modal">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End modal -->
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

		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
