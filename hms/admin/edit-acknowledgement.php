<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did=intval($_GET['id']);
if(isset($_POST['submit']))
{
	$receiver=$_POST['to'];
	$issuer=$_POST['from'];
	$items=$_POST['item'];
	$cost=$_POST['cost'];
	$collected=$_POST['collected'];
	$admin=$_POST['status'];

$sql = "UPDATE acknowledgements set receiver='$receiver',issuer='$issuer',items='$items',
				cost='$cost',collected='$collected',status1='$admin' WHERE id='$did'";
$con1 = mysqli_query($con,$sql);
if($con1)
{
	echo "<script>alert('Acknowledgement Updated Successfully');</script>";
	header('location:manage-acknowledgement.php');
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Edit Customer Details</title>
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
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Admin | Edit Acknowledgement Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Edit Acknowledgement Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row print-container">
												<div class="panel-heading">
													<h5 class="panel-title">Acknowledgement Details</h5>
												</div>
												<div class="panel-body">
<?php $sql= "SELECT * FROM acknowledgements WHERE id='$did'";
$con2 = mysqli_query($con,$sql);
while($data=mysqli_fetch_array($con2))
{
?>
	<form role="form" name="adddoc" method="post" onSubmit="return valid();">
			<div class="col-md-6">
				<div class="form-group">
								<label for="doctorname" class="text-bold">To:</label>
							<input type="text" name="to" class="form-control" value="<?php echo htmlentities($data['receiver']);?>" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
									<label for="doctorname" class="text-bold">From:</label>
							<input type="text" name="from" class="form-control" value="<?php echo htmlentities($data['issuer']);?>" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
									<label for="address" class="text-bold">Item</label>
							<input type="text" name="item" class="form-control" value="<?php echo htmlentities($data['items']);?>" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
									<label for="fess" class="text-bold">Cost</label>
							<input type="number" name="cost" class="form-control" value="<?php echo htmlentities($data['cost']);?>" >
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
									<label for="fess" class="text-bold">Collected</label>
							<input type="text" name="collected" class="form-control" required="required"  value="<?php echo htmlentities($data['collected']);?>">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
									<!-- <label for="fess" class="text-bold">Admin</label>
							<input type="text" name="status" class="form-control" value="<?php echo htmlentities($data['status1']);?>"> -->
				</div>
			</div>
																
<?php } ?>	
			<div class="col-md-6 pt-3">
				<button type="submit" name="submit" class="btn btn-success btn-primary">Update</button>
			</div>
	</form>
												</div>
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
