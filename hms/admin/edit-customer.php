<?php
session_start();
// error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did=intval($_GET['id']);
if(isset($_POST['submit']))
{
	$lastname=$_POST['lastname'];
	$firstname=$_POST['firstname'];
	$birthdate=$_POST['birthdate'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
	$passport=$_POST['passport'];
	$notes=$_POST['notes'];
	$adminnotes=$_POST['adminnotes'];

$sql = "UPDATE address_book set Lastname='$lastname',Firstname='$firstname',Birthdate='$birthdate',
				Email='$email',Mobile='$mobile',Passport='$passport',Notes='$notes',AdminNotes='$adminnotes' where id='$did'";
$con1= mysqli_query($con,$sql);
if($con1)
{
	echo "<script>alert('Customer Updated Successfully');</script>";
	header('location:manage-customers.php');
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
									<h1 class="mainTitle">Admin | Edit Customer Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Edit Customer Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Customer Details</h5>
												</div>
												<div class="panel-body">
<?php $sql= "SELECT * FROM address_book WHERE id='$did'";
$con2 = mysqli_query($con,$sql);
while($data=mysqli_fetch_array($con2))
{
?>
	<form role="form" name="adddoc" method="post" onSubmit="return valid();">
			<div class="form-group">
								<label for="doctorname" class="text-bold">Last Name</label>
						<input type="text" name="lastname" class="form-control" value="<?php echo htmlentities($data['Lastname']);?>" >
			</div>

			<div class="form-group">
								<label for="doctorname" class="text-bold">First Name</label>
						<input type="text" name="firstname" class="form-control" value="<?php echo htmlentities($data['Firstname']);?>" >
			</div>
			<div class="form-group">
								<label for="address" class="text-bold">Birthdate</label>
						<input type="text" name="birthdate" class="form-control" value="<?php echo htmlentities($data['Birthdate']);?>" >
			</div>
			<div class="form-group">
								<label for="fess" class="text-bold">Mobile Number</label>
						<input type="number" name="mobile" class="form-control" value="<?php echo htmlentities($data['Mobile']);?>" >
			</div>
				
			<div class="form-group">
								<label for="fess" class="text-bold">Email</label>
						<input type="email" name="email" class="form-control" required="required"  value="<?php echo htmlentities($data['Email']);?>">
			</div>
			<div class="form-group">
								<label for="fess" class="text-bold">Passport #</label>
						<input type="text" name="passport" class="form-control" value="<?php echo htmlentities($data['Passport']);?>">
			</div>
			<div class="form-group">
								<label for="fess" class="text-bold">Notes</label>
						<textarea name="notes" class="form-control"><?php echo htmlentities($data['Notes']);?></textarea>
			</div>
			<div class="form-group">
									<label for="fess" class="text-bold">Admin Notes</label>
						<textarea name="adminnotes" class="form-control"><?php echo htmlentities($data['AdminNotes']);?></textarea>
			</div>
														
<?php } ?>		
			<button type="submit" name="submit" class="btn btn-o btn-primary">Update</button>
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
